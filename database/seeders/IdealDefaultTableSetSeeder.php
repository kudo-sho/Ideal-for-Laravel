<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IdealDefaultTableSetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $path = 'C:\xampp\htdocs\Ideal-for-Laravel\database\sql\DB_ideal_test.sql';
        DB::unprepared(file_get_contents($path));
    }
}
