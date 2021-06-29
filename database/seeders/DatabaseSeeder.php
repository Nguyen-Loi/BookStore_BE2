<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(
            DataBook::class,
        );
        $this->call(
            DataAuthor::class,
        );
        $this->call(
            DataCategory::class,
        );
        $this->call(
            DataUsers::class,
        );
        $this->call(
            DataBookOrders::class,
        );
        $this->call(
            DataOrders::class,
        );
        $this->call(
            DataComment::class,
        );
    }
}
