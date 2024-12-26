<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("users")->insert([
            [
                'name'=>'Aleksandra',
                'username'=>'admin',
                'email'=> 'admin@gmail.com',
                'password'=> bcrypt('1111'),
                'role'=> 'admin',
                'status'=> 'active',
            ],

            [
                'name'=> 'Aleksandra',
                'username'=> 'user',
                'email'=> 'user@gmail.com',
                'password'=> bcrypt('1111'),
                'role'=> 'user',
                'status'=> 'active',
            ]
        ]);
    }
}
