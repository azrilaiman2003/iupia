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
            'ic_number' => '000000000000',
            'college_number' => '0000000000',
            'is_first_login' => false,
            'email' => 'student@gmail.com',
            'phone' => '601124371722',
            'password' => Hash::make('ayam12345'),
            'company_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('industries')->insert([
            'name' => 'Industry',
            'email' => 'industry@gmail.com',
            'phone' => '601544371722',
            'password' => Hash::make('ayam12345'),
            'company_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('supervisors')->insert([
            'name' => 'Supervisor',
            'email' => 'supervisor@gmail.com',
            'password' => Hash::make('ayam12345'),
            'phone' => '601124371432',
            'company_id' => 1,
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

        DB::table('companies')->insert([
            'name' => 'Company',
            'address' => 'Ipoh',
            'phone' => '601124371722',
            'fax' => '601124371722',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('logbook')->insert([
            'category' => '1',
            'title' => 'Title',
            'date' => '2025-04-04',
            'hari' => 'Khamis',
            'location' => 'Ipoh',
            'field1' => 'Field1',
            'field2' => 'Field2',
            'field3' => 'Field3',
            'field4' => 'Field4',
            'status' => '0',
            'student_id' => '1',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('institutions')->insert([
            'logo' => 'logo/institution.jpeg',
            'name' => 'Institution',
            'address' => 'Ipoh',
            'phone' => '601124371722',
            'fax' => '601124371722',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

    }
}
