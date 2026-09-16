<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
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

    public function test_voter_can_register_with_phone_number(): void
    {
        $response = $this->post('/voting/register', [
            'name' => 'Voter Baru',
            'phone' => '081298765432',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $response->assertRedirect(route('voting'));

        $user = User::query()->where('phone', '081298765432')->firstOrFail();

        $this->assertAuthenticatedAs($user);
        $this->assertTrue($user->hasRole('voter'));
    }
}
