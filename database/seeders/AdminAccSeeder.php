<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminAccSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
            [
                'name' => 'Admin',
                'email' => 'huy.nguyen22@student.passerellesnumeriques.org',
                'password' => '$2y$10$A4DC8.iJY0NDzCIKeAyWu.Mvrr2wrRAmbzIkm8kQ9nrTVL/36hIz6'
            ]
        );

        DB::table('oauth_clients')->insert([
            'id' => '93cc2b61-8984-4484-9511-38a66d003582',
            'name' => 'API_LandingPage_PNV Personal Access Client',
            'secret' => 'iIhVunTzlxXTujwkNQY62QVnNA7TnmD7zMLsTOLd',
            'redirect' => 'http://localhost',
            'personal_access_client' => 1,
            'password_client' => 0,
            'revoked' => 0,
        ]);

        DB::table('oauth_clients')->insert([
            'id' => '93cc2b62-27d8-44e1-8f8a-57a056733ae3',
            'name' => 'API_LandingPage_PNV Password Grant Client',
            'secret' => 'DVeWD2RSu4rOiFyfm6WkDHvXQfXUjhBOkvckVi4Q',
            'provider' => 'users',
            'redirect' => 'http://localhost',
            'personal_access_client' => 1,
            'password_client' => 0,
            'revoked' => 0,
        ]);

        DB::table('oauth_personal_access_clients')->insert([
            'client_id' => '93cc2b61-8984-4484-9511-38a66d003582',
        ]);
    }
}
