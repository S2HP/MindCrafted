<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        // Remove any existing instructor user
        DB::table('users')->where('email', 'instructor@example.com')->delete();
        // Remove any existing admin user
        DB::table('users')->where('email', 'admin@example.com')->delete();

        // Insert admin user
        DB::table('users')->insert([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'role' => 'admin'
        ]);

        // Insert instructor user
        DB::table('users')->insert([
            'name' => 'Instructor',
            'email' => 'instructor@example.com',
            'password' => Hash::make('newpassword'),
            'role' => 'instructor'
        ]);
    }
}