<?php
// -------------------------- GUIDE USE --------------------------

/**
 * Use below command to create/drop database:
 * - To CREATE DATABASE : php artisan mysql:db createdb <database_name>
 * - To DROP DATABASE : php artisan mysql:db dropdb <database_name>
 */


// -------------------------- CODE --------------------------

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class mysql extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mysql:db {action?} {name?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new mysql database schema based on the database config file/Drop a database';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $schemaName = $this->argument('name') ?: config("database.connections.mysql.database");

        $action = $this->argument('action');

        if ($action == 'createdb') {

            $charset = config("database.connections.mysql.charset", 'utf8mb4');
            $collation = config("database.connections.mysql.collation", 'utf8mb4_unicode_ci');

            config(["database.connections.mysql.database" => null]);

            $query = "CREATE DATABASE IF NOT EXISTS $schemaName CHARACTER SET $charset COLLATE $collation;";

            DB::statement($query);

            config(["database.connections.mysql.database" => $schemaName]);
            $this->info('Create database ' . $schemaName . ' was successful!');
        } elseif ($action == 'dropdb') {

            $query = "DROP DATABASE IF EXISTS $schemaName;";

            DB::statement($query);
            $this->info('Drop database ' . $schemaName . ' was successful!');
        } else {
            $this->error('This command does not exist!');
            $this->error('Use below command to create/drop database:');
            $this->error('  - To CREATE DATABASE : php artisan mysql:db createdb <database_name>');
            $this->error('  - To DROP DATABASE : php artisan mysql:db dropdb <database_name>');
        }
    }
}
