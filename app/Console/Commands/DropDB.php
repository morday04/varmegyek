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
<<<<<<< HEAD
    protected $signature = 'mysql:dropdb {name?}';
=======
    protected $signature = 'mysql:dropdb {name}';
>>>>>>> 5d18aa7cbd1a38da7f3e877db2d6bfb5026129f9

    /**
     * The console command description.
     *
     * @var string
     */
<<<<<<< HEAD
    protected $description = 'Drop an existing mysql database schema based on the database config file';
=======
    protected $description = 'Delete an already existing database';
>>>>>>> 5d18aa7cbd1a38da7f3e877db2d6bfb5026129f9

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
<<<<<<< HEAD
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
=======
        $schemaName = $this->argument('name');

        config(["database.connections.mysql.database" => null]);

        $query = "DROP DATABASE IF EXISTS $schemaName";
		
		try {
			DB::statement($query);
			echo "$schemaName adatbázis törölve";
		} 
		catch(Exception $e){
			$e->getMessage();
		}

        config(["database.connections.mysql.database" => $schemaName]);

    }
}
>>>>>>> 5d18aa7cbd1a38da7f3e877db2d6bfb5026129f9
