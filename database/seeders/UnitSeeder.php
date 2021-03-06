<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('units')->insert([
            ['name' => 'NA'],
            ['name' => 'ft'],
            ['name' => 'kgs'],
            ['name' => 'mtr'],
            ['name' => 'nos'],
            ['name' => 'set']
        ]);
    }
}
