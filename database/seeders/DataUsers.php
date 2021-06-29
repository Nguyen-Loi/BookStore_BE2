<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
class DataUsers extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

            DB::table('users')->insert([
                'id' => "1",
                'name'=> "Nguyễn Hồng Lợi",
                'role' => 0,
                'email'=> 'hongloi@gmail.com',
                'email_verified_at' => '2021-05-22 14:52:21',
                'phone' => '0568124428152',
                'password' => '$2y$10$SSTszQc1ltfGYBeVpwlOSOQoAIWdHgAkZIYckwxjbB2lIQP5UpfQS',
                'address' => 'Linh trung, Thủ đức',
                'updated_at' => '2021-05-22 14:52:21',
                'created_at' => '2021-05-22 14:52:21',
            ]);
            DB::table('users')->insert([
                'id' => "2",
                'name'=> "Nguyễn Truong Sinh",
                'role' => 0,
                'email'=> 'truongsinh@gmail.com',
                'email_verified_at' => '2021-05-22 14:52:21',
                'phone' => '056844228135',
                'password' => '$2y$10$SSTszQc1ltfGYBeVpwlOSOQoAIWdHgAkZIYckwxjbB2lIQP5UpfQS',
                'address' => 'Linh trung, Thủ đức',
                'updated_at' => '2021-05-22 14:52:21',
                'created_at' => '2021-05-22 14:52:21',
            ]);
            DB::table('users')->insert([
                'id' => "3",
                'name'=> "Nguyễn Thanh Duy",
                'role' => 0,
                'email'=> 'thanhduy@gmail.com',
                'email_verified_at' => '2021-05-22 14:52:21',
                'phone' => '05684813352',
                'password' => '$2y$10$SSTszQc1ltfGYBeVpwlOSOQoAIWdHgAkZIYckwxjbB2lIQP5UpfQS',
                'address' => 'Linh hủ đức',
                'updated_at' => '2021-05-22 14:52:21',
                'created_at' => '2021-05-22 14:52:21',
            ]);
            DB::table('users')->insert([
                'id' => "4",
                'name'=> "Nguyễn Trung Nghia",
                'role' => 0,
                'email'=> 'trungnghia@gmail.com',
                'email_verified_at' => '2021-05-22 14:52:21',
                'phone' => '05684462625',
                'password' => '$2y$10$SSTszQc1ltfGYBeVpwlOSOQoAIWdHgAkZIYckwxjbB2lIQP5UpfQS',
                'address' => 'Linh trung, Thủ đức',
                'updated_at' => '2021-05-22 14:52:21',
                'created_at' => '2021-06-22 14:52:21',
            ]);
            DB::table('users')->insert([
                'id' => "5",
                'name'=> "Nguyễn Quang Lam",
                'role' => 0,
                'email'=> 'quanglam@gmail.com',
                'email_verified_at' => '2021-05-22 14:52:21',
                'phone' => '058153453452',
                'password' => '$2y$10$SSTszQc1ltfGYBeVpwlOSOQoAIWdHgAkZIYckwxjbB2lIQP5UpfQS',
                'address' => 'Linh trung, Thủ đức',
                'updated_at' => '2021-05-22 14:52:21',
                'created_at' => '2021-05-22 14:52:21',
            ]);
            DB::table('users')->insert([
                'id' => "6",
                'name'=> "Nguyễn Van V",
                'role' => 0,
                'email'=> 'vanv@gmail.com',
                'email_verified_at' => '2021-05-22 14:52:21',
                'phone' => '05688428135',
                'password' => '$2y$10$SSTszQc1ltfGYBeVpwlOSOQoAIWdHgAkZIYckwxjbB2lIQP5UpfQS',
                'address' => 'Linh trung, Thủ đức',
                'updated_at' => '2021-05-22 14:52:21',
                'created_at' => '2021-05-22 14:52:21',
            ]);
            DB::table('users')->insert([
                'id' => "7",
                'name'=> "user",
                'role' => 0,
                'email'=> 'user@gmail.com',
                'email_verified_at' => '2021-05-22 14:52:21',
                'phone' => '042815223123',
                'password' => '$2y$10$SSTszQc1ltfGYBeVpwlOSOQoAIWdHgAkZIYckwxjbB2lIQP5UpfQS',
                'address' => 'Linh trung, Thủ đức',
                'updated_at' => '2021-05-22 14:52:21',
                'created_at' => '2021-05-22 14:52:21',
            ]);
            DB::table('users')->insert([
                'id' => "8",
                'name'=> "Thay thai",
                'role' => 1,
                'email'=> 'thai@gmail.com',
                'email_verified_at' => '2021-05-22 14:52:21',
                'phone' => '04518321225',
                'password' => '$2y$10$SSTszQc1ltfGYBeVpwlOSOQoAIWdHgAkZIYckwxjbB2lIQP5UpfQS',
                'address' => 'TP HCM',
                'updated_at' => '2021-05-22 14:52:21',
                'created_at' => '2021-05-22 14:52:21',
            ]);
            DB::table('users')->insert([
                'id' => "9",
                'name'=> "admin",
                'role' => 1,
                'email'=> 'admin@gmail.com',
                'email_verified_at' => '2021-05-22 14:52:21',
                'phone' => '04518325',
                'password' => '$2y$10$SSTszQc1ltfGYBeVpwlOSOQoAIWdHgAkZIYckwxjbB2lIQP5UpfQS',
                'address' => 'Linh trung, Thủ đức',
                'updated_at' => '2021-05-22 14:52:21',
                'created_at' => '2021-05-22 14:52:21',
            ]);
             //seeder user
             $limit = 500;
             $fake  = Faker::create();
             for ($i = 0; $i < $limit; $i++) {
                DB::table('users')->insert([
                    'name'=> 	$fake->name,
                    'role' => 0,
                    'email'=> 	$fake->unique->email,
                    'email_verified_at' => $fake->date("Y-m-d H:i:s"),
                    'phone' => $fake->unique->phoneNumber,
                    'password' => '$2y$10$SSTszQc1ltfGYBeVpwlOSOQoAIWdHgAkZIYckwxjbB2lIQP5UpfQS',
                    'address' =>$fake->city,
                    'updated_at' => $fake->date("Y-m-d H:i:s"),
                    'created_at' => $fake->date("Y-m-d H:i:s"),
                ]);

             }
        }

}
