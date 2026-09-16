<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(RoleSeeder::class);

        $users = [
            ['name' => 'Super Admin ISC', 'email' => 'superadmin@gmail.com', 'role' => 'admin'],
            ['name' => 'Panitia ISC', 'email' => 'panitia@superband.test', 'role' => 'panitia'],
            ['name' => 'Juri ISC', 'email' => 'juri@superband.test', 'role' => 'juri'],
            ['name' => 'Voter ISC', 'email' => 'voter@superband.test', 'phone' => '081234567890', 'role' => 'voter'],
        ];

        foreach ($users as $userData) {
            $user = User::query()->updateOrCreate(
                ['email' => $userData['email']],
                [
                    'name' => $userData['name'],
                    'phone' => $userData['phone'] ?? null,
                    'password' => 'password',
                ],
            );

            $user->syncRoles([$userData['role']]);
        }
    }
}
