<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('students')->insert([
            'name' => 'Student2',
            'email' => 'student2@gmail.com',
            'password' => Hash::make('ayam12345'),
            'phone' => '601124371722',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
