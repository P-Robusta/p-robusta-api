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
            'total_students' => 500,
            'alumni' => 350,
            'current_students' => 130,
            'average_wage' => 14567452,
            'percent_get_job' => 94,
            'percent_alumni_it' => 88,
            'alumni_allowance' => 36
        ]);
    }
}
