<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DataCategory extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

            DB::table('Category')->insert([
                'nameCategory' => 'Adventure',
            ]);
            DB::table('Category')->insert([
                'nameCategory' => 'Study',
            ]);
            DB::table('Category')->insert([
                'nameCategory' => 'Programming',
            ]);
            DB::table('Category')->insert([
                'nameCategory' => 'Romance',
            ]);
            DB::table('Category')->insert([
                'nameCategory' => 'Comedy',
            ]);
    }
}
