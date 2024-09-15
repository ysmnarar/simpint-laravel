<?php

namespace Database\Seeders;
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
        DB::table("users")->insert(array(
            array(
                'name' => 'Admin',
                'email'=> 'admin@gmail.com',
                'password' => Hash::make('123456'),
                'role'=> 1,
            ),
            array(
                'name' => 'Customer',
                'email'=> 'customer@gmail.com',
                'password' => Hash::make('7891011'),
                'role'=> 1,
            ),
        ));
    }
}
