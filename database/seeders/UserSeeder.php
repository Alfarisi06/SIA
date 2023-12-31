<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'nama' => Str::random(5),
            'email' => Str::random(5) . '@gmail.com',
            'username' => 'admin',
            'password' => Hash::make('password'),
            'role' => 1
        ]);
    }
}
