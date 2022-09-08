<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'name' => 'Admin',
                'role' => 0,
            ],
            [
                'name' => 'User',
                'role' => 1,
            ],
        ];

        try {
            foreach ($roles as $role) {
                Role::create($role);
            }
        } catch (\Throwable $th) {
        }
    }
}
