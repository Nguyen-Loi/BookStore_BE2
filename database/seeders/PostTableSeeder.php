<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {      
        DB::table('admins')->insert([
            
            'name' => 'Nguyễn Hồng Lợi',
            'password' => '12345678',
            'email' => 'hongloi12123@gmail.com'
        ]);
        DB::table('admins')->insert([
            
            'name' => 'Nguyễn Thành Duy',
            'password' => '12345678',
            'email' => 'duyocheo@gmail.com'
        ]);
        DB::table('admins')->insert([
            
            'name' => 'Nguyễn Trung Nghĩa',
            'password' => '12345678',
            'email' => 'nbhp54@gmail.com'
        ]);  
    }
}
