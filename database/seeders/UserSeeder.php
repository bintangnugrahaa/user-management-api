<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'name' => 'Muhammad Bintang Nugraha',
                'email' => 'muhammadbintangnugraha18.com',
                'phone' => '085155344998',
                'is_active' => true,
                'department' => 'Software Engineer'
            ]
        ];

        foreach ($users as $userData) {
            User::create($userData);
        }
    }
}
