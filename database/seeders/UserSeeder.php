<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'login' => 'admin',
                'password' => Hash::make('admin123'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'login' => 'user1',
                'password' => Hash::make('password1'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'login' => 'user2',
                'password' => Hash::make('password2'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
