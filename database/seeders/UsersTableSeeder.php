<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
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
        DB::table('users')->truncate();
        
        DB::table('users')->insert([
            'name'      => 'Admin',
            'email'     => 'admin@bktask.com',
            'role'      => 'admin',
            'password'  => Hash::make('admin1234'),
            'api_token' => Str::random(60),
        ]);
    }
}
