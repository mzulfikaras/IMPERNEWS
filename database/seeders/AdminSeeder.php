<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Lorentz Levanone',
                'email' => 'admin1@email.com',
                'password' => Hash::make('adminlorentz1234'),
            ],
            [
                'name' => 'Ibnu Alian Saputra',
                'email' => 'admin2@email.com',
                'password' => Hash::make('adminibnu1234'),
            ],
            [
                'name' => 'Ami Rifansyah',
                'email' => 'admin3@email.com',
                'password' => Hash::make('adminami1234'),
            ],
            [
                'name' => 'Muhammad Zulfikar Alisunan',
                'email' => 'admin4@email.com',
                'password' => Hash::make('adminzulfikar1234'),
            ],
        ]);
    }
}
