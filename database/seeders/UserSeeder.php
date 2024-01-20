<?php

namespace Database\Seeders;

use App\Models\Admin;
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
        User::create([
            'nickname' => 'user_1',
            'name' => 'User 1',
            'email' => 'user_1@yopmail.com',
            'password' => bcrypt('12345678')
        ]);

        User::create([
            'nickname' => 'user_2',
            'name' => 'User 2',
            'email' => 'user_2@yopmail.com',
            'password' => bcrypt('12345678')
        ]);

        Admin::create([
            'name' => 'admin',
            'email' => 'admin@yopmail.com',
            'password' => bcrypt('12345678')
        ]);
    }
}
