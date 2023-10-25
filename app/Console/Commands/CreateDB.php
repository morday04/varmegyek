<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class CreateDB extends Command
{
<<<<<<< HEAD
   /**
=======
    /**
>>>>>>> 5d18aa7cbd1a38da7f3e877db2d6bfb5026129f9
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mysql:createdb {name?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new mysql database schema based on the database config file';

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
        $charset = config("database.connections.mysql.charset",'utf8mb4');
        $collation = config("database.connections.mysql.collation",'utf8mb4_unicode_ci');

        config(["database.connections.mysql.database" => null]);

        $query = "CREATE DATABASE IF NOT EXISTS $schemaName CHARACTER SET $charset COLLATE $collation;";

        try {
<<<<<<< HEAD
            DB::statement($query);
            echo "$schemaName database has been created.";
        }
        catch (Exception $e) {
            $e->getMessage();
        }

        config(["database.connections.mysql.database" => $schemaName]);
    }

}
=======
			DB::statement($query);
			echo "$schemaName adatbázis létrehozva";
		} 
		catch(Exception $e){
			$e->getMessage();
		}
		

        config(["database.connections.mysql.database" => $schemaName]);

    }
}
>>>>>>> 5d18aa7cbd1a38da7f3e877db2d6bfb5026129f9
