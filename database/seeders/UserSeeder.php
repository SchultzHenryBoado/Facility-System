<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'last_name' => 'admin',
                'first_name' => 'admin',
                'company' => 'Obanana Corp.',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('admin123'),
                'role' => 'admin',
                'account_status' => 'ACTIVE'
            ],
            [
                'last_name' => 'Boado',
                'first_name' => 'Schultz Henry',
                'company' => 'Obanana Corp.',
                'email' => 'schultzhenry.boado@obanana.com',
                'password' => bcrypt('abc123'),
                'role' => 'user',
                'account_status' => 'ACTIVE'
            ]
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
