<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
// use this to export the database from the phpmyadmin
use Illuminate\Support\Facades\DB;
// set the hashing for the password
use Illuminate\Support\Facades\Hash;

// This seeder is to input value inside the database

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'=> 'Test name',
            'email'=>'tests@gmail.com',
            'password'=> Hash::make('123456789')
        ]);
    }
}
