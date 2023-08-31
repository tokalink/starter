<?php

namespace Tokalink\Starter\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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
            'email' => 'admin@tokalink.id',
            'password' => bcrypt('12345678'),
            'created_at' => Date('Y-m-d H:i:s'),
        ];
        \DB::table($user_table)->truncate();
        \DB::table($user_table)->insert($user);

    }
}
