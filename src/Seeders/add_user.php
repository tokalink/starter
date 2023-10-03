<?php

namespace Tokalink\Starter\Seeders;

use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class add_user extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user_table = 'users';
        $user = [
            'name' => 'Tokalink',
            'username' => 'tokalink',
            'phone' => '08123456789',
            'email' => 'admin@tokalink.id',
            'password' => bcrypt('12345678'),
            'created_at' => Date('Y-m-d H:i:s'),
        ];
        DB::table($user_table)->truncate();
        DB::table($user_table)->insert($user);
        // fakedata data 2000
        // $faker = Factory::create();
        // $data = [];
        // for ($i = 0; $i < 1000; $i++) {
        //     $data[] = [
        //         'name' => $faker->name,
        //         'username' => $faker->userName,
        //         'phone' => $faker->phoneNumber,
        //         'email' => $faker->email,
        //         'password' => bcrypt('12345678'),
        //         'created_at' => Date('Y-m-d H:i:s'),
        //     ];
        // }
        // DB::table($user_table)->insert($data);
        

    }
}
