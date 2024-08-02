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
        $user = User::create([
            'email' => 'user@gmail.com',
            'password' => bcrypt('12345678')
        ]);

        $user->profile()->create([
            'first_name' => 'first_name',
            'last_name' => 'last_name',
            'gender' => 1,
            'phone_number' => '0123456789',
            'birthday' => '2001-1-1',
            'address' => 'address',
        ]);

        Admin::create([
            'name' => 'admin',
            'email' => 'admin@yopmail.com',
            'password' => bcrypt('12345678')
        ]);
    }
}
