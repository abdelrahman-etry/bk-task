<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class StudentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('students')->truncate();
        
        DB::table('students')->insert([
            'name'      => 'Abdelrahman Etry',
            'school_id' => 1,
            'order'     => 1,
        ]);
    }
}
