<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $param = [
            'usr_id' => 1,
            'name' => 'test',
            'email' => 'test@test',
            'password' =>'test',

        ];
        DB::table('users')->insert($param);
    }
}
