<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $param = [
            'adm_id' => 1,
            'adm_name' => 'test',
            'password' => 'test',
            'exp' => 'テスト用'
        ];
        DB::table('admins')->insert($param);
    }
}
