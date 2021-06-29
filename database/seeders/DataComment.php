<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class DataComment extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $limit = 4020;
        $fake  = Faker::create();
        $count = 0;
        for ($i = 0; $i < $limit; $i++) {
            $count++;
            DB::table('ratings')->insert([
                'idUser' => '1',
                'idBook' => $count,
                'comment' => 'The book ' . Str::random(30),
                'rate' => $fake->numberBetween($min = 1, $max = 5),
                'created_at' => $fake->date("Y-m-d H:i:s"),
                'updated_at' => $fake->date("Y-m-d H:i:s"),
            ]);
            DB::table('ratings')->insert([
                'idUser' => '2',
                'idBook' => $count,
                'comment' => 'The book ' . Str::random(30),
                'rate' => $fake->numberBetween($min = 1, $max = 5),
                'created_at' => $fake->date("Y-m-d H:i:s"),
                'updated_at' => $fake->date("Y-m-d H:i:s"),
            ]);
            DB::table('ratings')->insert([
                'idUser' => '3',
                'idBook' => $count,
                'comment' => 'The book ' . Str::random(20),
                  'rate' => $fake->numberBetween($min = 1, $max = 5),
                'created_at' => $fake->date("Y-m-d H:i:s"),
                'updated_at' => $fake->date("Y-m-d H:i:s"),
            ]);
            DB::table('ratings')->insert([
                'idUser' => '4',
                'idBook' => $count,
                'comment' => 'The book ' . Str::random(10),
                  'rate' => $fake->numberBetween($min = 1, $max = 5),
                'created_at' => $fake->date("Y-m-d H:i:s"),
                'updated_at' => $fake->date("Y-m-d H:i:s"),
            ]);
            DB::table('ratings')->insert([
                'idUser' => '5',
                'idBook' => $count,
                'comment' => 'The book ' . Str::random(13),
                  'rate' => $fake->numberBetween($min = 1, $max = 5),
                'created_at' => $fake->date("Y-m-d H:i:s"),
                'updated_at' => $fake->date("Y-m-d H:i:s"),
            ]);
            DB::table('ratings')->insert([
                'idUser' => '6',
                'idBook' => $count,
                'comment' => 'The book ' . Str::random(15),
                  'rate' => $fake->numberBetween($min = 1, $max = 5),
                'created_at' => $fake->date("Y-m-d H:i:s"),
                'updated_at' => $fake->date("Y-m-d H:i:s"),
            ]);
            DB::table('ratings')->insert([
                'idUser' => '7',
                'idBook' => $count,
                'comment' => 'The book ' . Str::random(24),
                  'rate' => $fake->numberBetween($min = 1, $max = 5),
                'created_at' => $fake->date("Y-m-d H:i:s"),
                'updated_at' => $fake->date("Y-m-d H:i:s"),
            ]);
            DB::table('ratings')->insert([
                'idUser' => '8',
                'idBook' => $count,
                'comment' => 'The book ' . Str::random(25),
                  'rate' => $fake->numberBetween($min = 1, $max = 5),
                'created_at' => $fake->date("Y-m-d H:i:s"),
                'updated_at' => $fake->date("Y-m-d H:i:s"),
            ]);
          
        }
    }
}
