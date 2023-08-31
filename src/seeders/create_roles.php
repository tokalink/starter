<?php

namespace Tokalink\Starter\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class create_roles extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles_table = 'roles';
        $roles = [
            [
                'name' => 'admin',
                'description' => 'admin',
                'created_at' => Date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'user',
                'description' => 'user',
                'created_at' => Date('Y-m-d H:i:s'),
            ],
        ];
        \DB::table($roles_table)->truncate();
        \DB::table($roles_table)->insert($roles);
    }
}
