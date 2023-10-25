<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class DropDB extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mysql:dropdb {name?}';

    /**
     * The console command description.
     *
     * @var string
     */

    protected $description = 'Delete an already existing database';

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

        config(["database.connections.mysql.database" => null]);

        $query = "DROP DATABASE IF EXISTS $schemaName;";

        try {
            DB::statement($query);
            echo "$schemaName database has been dropped.";
        }
        catch (Exception $e) {
            $e->getMessage();
        }
    }
}
