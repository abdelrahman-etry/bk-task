<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class SchoolTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('schools')->truncate();
        
        DB::table('schools')->insert([
            'name'      => 'Kenana Language School',
            'status'    => 1,
        ]);

        DB::table('schools')->insert([
            'name'      => 'Najah Language School',
            'status'    => 1,
        ]);

        DB::table('schools')->insert([
            'name'      => 'Ekhlas Language School',
            'status'    => 1,
        ]);

        DB::table('schools')->insert([
            'name'      => 'FAIPS Language School',
            'status'    => 1,
        ]);
    }
}
