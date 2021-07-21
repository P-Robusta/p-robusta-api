<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('options')->insert(
            [
                [
                    'option' => 'Một lần (Once time)'
                ],
                [
                    'option' => '12 tháng (12 months)'
                ],
                [
                    'option' => '9 tháng (9 months)'
                ],
                [
                    'option' => '6 tháng (6 months)'
                ],
                [
                    'option' => '3 tháng (3 months)'
                ]
            ]
        );
    }
}
