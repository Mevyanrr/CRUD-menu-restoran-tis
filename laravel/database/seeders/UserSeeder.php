<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name'       => 'Flora',
                'username'   => 'flora',
                'password'   => Hash::make('flora123'),
                'role'       => 'koki',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                 'name'       => 'Oza',
                'username'   => 'oza',
                'password'   => Hash::make('oza123'),
                'role'       => 'kasir',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                 'name'       => 'Mevya',
                'username'   => 'mevya',
                'password'   => Hash::make('mevya123'),
                'role'       => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
