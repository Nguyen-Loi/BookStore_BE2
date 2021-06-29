<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DataBookOrders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('book_orders')->insert([
            'id' => "1",
            'book_id' => "1",
            'orders_id' => "1",
            'qty' => "1",
            'total' => "250",
        ]);
    
        $limit = 200;
        $fake  = Faker::create();
        $count=0;
        for ($i = 1; $i < $limit; $i++) {
            $count++;
            DB::table('book_orders')->insert([
                'book_id' => $fake->numberBetween($min = 100, $max = 700),
                'orders_id' => $count,
                'qty' => $fake->numberBetween($min = 1, $max = 6),
                'total' => $fake->numberBetween($min = 40, $max = 200),
            ]);
            DB::table('book_orders')->insert([
                'book_id' => $fake->numberBetween($min = 100, $max = 700),
                'orders_id' => $count,
                'qty' => $fake->numberBetween($min = 1, $max = 6),
                'total' => $fake->numberBetween($min = 40, $max = 200),
            ]);
            DB::table('book_orders')->insert([
                'book_id' => $fake->numberBetween($min = 100, $max = 700),
                'orders_id' => $count,
                'qty' => $fake->numberBetween($min = 1, $max = 6),
                'total' => $fake->numberBetween($min = 40, $max = 200),
            ]);
            DB::table('book_orders')->insert([
                'book_id' => $fake->numberBetween($min = 100, $max = 700),
                'orders_id' => $count,
                'qty' => $fake->numberBetween($min = 1, $max = 6),
                'total' => $fake->numberBetween($min = 40, $max = 200),
            ]);
        }
    }
}
