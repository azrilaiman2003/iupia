<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('students')->insert([
            'name' => 'Student',
            'email' => 'student@gmail.com',
            'phone' => '601124371722',
            'password' => Hash::make('ayam12345'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('industrial')->insert([
            'name' => 'Industry',
            'email' => 'industry@gmail.com',
            'company' => 'BAYAM (M) SDN BHD',
            'password' => Hash::make('ayam12345'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('supervisors')->insert([
            'name' => 'Supervisor',
            'email' => 'supervisor@gmail.com',
            'password' => Hash::make('ayam12345'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('admins')->insert([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('ayam12345'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
