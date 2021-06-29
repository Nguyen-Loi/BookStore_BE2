<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DataOrders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //seeder auto peding
        $limit = 200;
        $fake  = Faker::create();
        $count =0 ;
        for ($i = 1; $i < $limit; $i++) {
            $count++;
            DB::table('orders')->insert([
               
                'user_id' => $count+1,
                'total' => $fake->numberBetween($min = 120, $max = 1000),
                'status' => 'pending',
                'updated_at' =>  $fake->date("Y-m-d H:i:s"),
                'created_at' =>  $fake->date("Y-m-d H:i:s"),
            ]);
        }
    }
}
