<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NumberOverviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('number_overviews')->insert([
            'current_students' => 130,
            'alumni' => 1000,
            'percent_get_job' => 98,
            'partnership' => 50,
        ]);
    }
}
