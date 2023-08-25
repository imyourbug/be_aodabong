<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $accounts = [
            [
                'name' => 'Khải',
                'email' => 'duongvankhai2022001@gmail.com',
                'password' => Hash::make(12345678),
                'role' => 1
            ],
            [
                'name' => 'Chiến',
                'email' => 'chien@gmail.com',
                'password' => Hash::make(12345678),
                'role' => 1
            ],
            [
                'name' => 'Huy',
                'email' => 'huy@gmail.com',
                'password' => Hash::make(12345678),
                'role' => 1
            ]
        ];

        try {
            foreach ($accounts as $account) {
                User::create($account);
            }
        } catch (\Throwable $th) {
        }
    }
}
