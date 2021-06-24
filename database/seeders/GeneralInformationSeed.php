<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GeneralInformationSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('general_infomations')->insert([
            'introduction' => 'Passerelles numériques là tổ chức phi chính phủ của Pháp thành lập năm 2005 và hiện có ba trung tâm đào tạo tại Campuchia, Philippines và Việt Nam',
            'facebook' => 'https://www.facebook.com/passerelles.numeriques    ',
            'twitter' => "https://twitter.com/passerellesnume",
            'linkedin' => 'https://www.linkedin.com/company/455759',
            'youtube' => 'https://www.youtube.com/user/PasserellesNumerique',
        ]);
    }
}
