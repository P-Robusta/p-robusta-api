<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DonationInfomationSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('donation_information')->insert([
            'bank_name' => 'PASSERELLES NUMERIQUES(PN)',
            'account_number' => '19134608156019',
            'donation_type' => 'Via the bank',
        ]);
    }
}
