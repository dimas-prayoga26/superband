<?php

namespace Tests\Feature;

use App\Models\OtpCode;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class AuthLoginTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        if (($_ENV['DB_CONNECTION'] ?? null) === 'sqlite' && ! extension_loaded('pdo_sqlite')) {
            $this->markTestSkipped('The pdo_sqlite extension is required for database auth tests.');
        }

        parent::setUp();
    }

    public function test_legacy_login_url_redirects_to_admin_login(): void
    {
        $response = $this->get('/login');

        $response->assertRedirect('/admin/login');
    }

    public function test_user_without_voting_permission_redirects_to_voting_login(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/voting');

        $response->assertRedirectToRoute('voting.login');
    }

    public function test_staff_user_with_admin_panel_permission_can_login(): void
    {
        Permission::findOrCreate('access admin panel', 'web');
        $user = User::factory()->create([
            'email' => 'admin@example.test',
        ]);
        $user->givePermissionTo('access admin panel');

        $response = $this->post('/admin/login', [
            'email' => 'admin@example.test',
            'password' => 'password',
        ]);

        $response->assertRedirect(route('admin.dashboard'));
        $this->assertAuthenticatedAs($user);
    }

    public function test_staff_user_without_admin_panel_permission_is_rejected(): void
    {
        $user = User::factory()->create([
            'email' => 'voter@example.test',
        ]);

        $response = $this->post('/admin/login', [
            'email' => 'voter@example.test',
            'password' => 'password',
        ]);

        $response->assertSessionHasErrors('email');
        $this->assertGuest();
    }

    public function test_voter_role_can_login_to_voting(): void
    {
        $role = Role::findOrCreate('voter', 'web');
        Permission::findOrCreate('access voting', 'web');
        $role->givePermissionTo('access voting');
        $user = User::factory()->create([
            'email' => 'voter@example.test',
            'phone' => '081234567890',
        ]);
        $user->assignRole($role);

        $response = $this->post('/voting/login', [
            'phone' => '081234567890',
            'password' => 'password',
        ]);

        $response->assertRedirect(route('voting'));
        $this->assertAuthenticatedAs($user);
    }

    public function test_voter_registration_requests_whatsapp_otp(): void
    {
        config(['services.fonnte.token' => 'test-token']);
        Http::preventStrayRequests();
        Http::fake([
            'https://api.fonnte.com/send' => Http::response(['status' => true]),
        ]);

        $response = $this->postJson('/voting/register', [
            'name' => 'Voter Baru',
            'phone' => '081298765432',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $response
            ->assertOk()
            ->assertJsonPath('cooldown_seconds', 60);

        $otpCode = OtpCode::query()->where('phone', '081298765432')->firstOrFail();

        $this->assertNotNull($otpCode->password_hash);
        $response->assertSessionHas('voting_register_otp_id', $otpCode->id);
        Http::assertSent(fn ($request): bool => $request->url() === 'https://api.fonnte.com/send'
            && $request->hasHeader('Authorization', 'test-token')
            && $request['target'] === '6281298765432');
        $this->assertGuest();
    }

    public function test_voter_can_verify_registration_otp_and_login(): void
    {
        $otpCode = OtpCode::query()->create([
            'name' => 'Voter Baru',
            'phone' => '081298765432',
            'purpose' => 'voting_register',
            'code_hash' => Hash::make('1234'),
            'password_hash' => Hash::make('password'),
            'expires_at' => now()->addMinutes(5),
        ]);

        $response = $this
            ->withSession(['voting_register_otp_id' => $otpCode->id])
            ->postJson('/voting/register/verify', [
                'otp' => '1234',
            ]);

        $response
            ->assertOk()
            ->assertJsonPath('redirect_url', route('voting'));

        $user = User::query()->where('phone', '081298765432')->firstOrFail();

        $this->assertAuthenticatedAs($user);
        $this->assertTrue($user->hasRole('voter'));
        $this->assertNotNull($otpCode->refresh()->consumed_at);
    }

    public function test_voter_registration_requires_password_with_minimum_length(): void
    {
        $response = $this->post('/voting/register', [
            'name' => 'Voter Baru',
            'phone' => '081298765433',
            'password' => 'short',
            'password_confirmation' => 'short',
        ]);

        $response->assertSessionHasErrors([
            'password' => 'Password minimal 8 karakter.',
        ]);
        $this->assertGuest();
    }

    public function test_voter_registration_rejects_unmatched_password_confirmation(): void
    {
        $response = $this->post('/voting/register', [
            'name' => 'Voter Baru',
            'phone' => '081298765434',
            'password' => 'password',
            'password_confirmation' => 'different',
        ]);

        $response->assertSessionHasErrors([
            'password' => 'Password tidak sama.',
        ]);
        $this->assertGuest();
    }
}
