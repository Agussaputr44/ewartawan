<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'nama' => 'Admin User',
            'email' => 'admin@gmail.com',
            'nomor_telepon' => '1234567890',
            'gender' => 'pria',
            'password' => Hash::make('password'),
            'media' => '',
            'role' => 'admin',
        ]);

        User::create([
            'nama' => 'Wartawan User',
            'email' => 'wartawan@gmail.com',
            'nomor_telepon' => '1234567891',
            'gender' => 'wanita',
            'password' => Hash::make('password'),
            'media' => '',
            'role' => 'wartawan',
        ]);

        User::create([
            'nama' => 'Redaktur User',
            'email' => 'redaktur@gmail.com',
            'nomor_telepon' => '1234567892',
            'gender' => 'pria',
            'password' => Hash::make('password'),
            'media' => '',
            'role' => 'redaktur',
        ]);

        User::create([
            'nama' => 'User User',
            'email' => 'user@gmail.com',
            'nomor_telepon' => '1234567893',
            'gender' => 'wanita',
            'password' => Hash::make('password'),
            'media' => '',
            'role' => 'user',
        ]);
    }
}
