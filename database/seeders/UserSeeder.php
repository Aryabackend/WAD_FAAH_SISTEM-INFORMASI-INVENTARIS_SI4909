<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::query()
            ->firstOrNew(['email' => 'admin@email.com']);
        $admin->fill([
            'name' => 'admin',
            'password' => Hash::make('password')
        ]);
        $admin -> role =  User::ROLE_ADMIN;
        $admin -> email_verified_at ??= now();
        $admin->save(); 

        $user = User::query()
            ->firstOrNew(['email' => 'user@email.com']);
        $user->fill([
            'name' => 'user',
            'password' => Hash::make('password')
        ]);
        $user -> role =  User::ROLE_USER;
        $user -> email_verified_at ??= now();
        $user->save(); 
    }
}
