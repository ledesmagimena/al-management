<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $password = Hash::make('123456');
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => $password,
        ]);

        $seller = User::create([
            'name' => 'Ventas',
            'email' => 'ventas@gmail.com',
            'password' => $password,
        ]);
        
        $admin->assignRole('admin');
        $seller->assignRole('seller');
    }
}
