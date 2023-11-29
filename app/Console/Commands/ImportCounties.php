<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class ImportCounties extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:import-counties {fileName} {database?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'A megadott .csv fájlból importálja a vármegyéket a megadott adatbázisba';

    /**
     * Execute the console command.
     */
    /**public function handle()
    {
        $filename = $this->argument('filename');
        $databaseName = $this->argument('database') ?? config('database.default');

        if (!Schema::connection($databaseName)->hasTable('varmegye')) {
            $this->error("Nem létezik a '$databaseName' adatbázis.");
            return;
        }

        // Get CSV data
        $csvData = $this->getCsvData($filename);

        // Insert data into the database
        $this->insertDataIntoDatabase($csvData, $databaseName);

        $this->info('Counties imported successfully!');
    }

    private function getCsvData($filename)
    {
        return [];
    }

    */
    public function handle()
    {
        $fileName=$this->argument('fileName');
        $csvData= $this->getCsvData($fileName);
        var_dump($csvData);
        return 0;
    }

    private function getCsvData($fileName, $withHeader=true)
    {
        if (!file_exists($fileName))
        {
            echo"$fileName nem található";
            return false;
        }
        $csvFile = fopen($fileName, 'r');
        $header = fgetcsv($csvFile);
        if($withHeader)
        {
            $lines=$header;
        }
        else
        {
            $lines=[];
        }
        while(!feof($csvFile))
        {
            $lines=fgetcsv($csvFile);
            $lines[] = $lines;
        }
        fclose($csvFile);

        return $lines;
    }
    /**private function insertDataIntoDatabase($data, $databaseName)
    {
        foreach ($data as $row) {
            $firstElement = explode(',', $row)[0];
    
            $existingRecord = DB::connection($databaseName)
                ->table('varmegye')
                ->where('name', $firstElement)  
                ->first();
    
            if (!$existingRecord) {
                DB::connection($databaseName)->table('varmegye')->insert(['name' => $firstElement]);
            }
        }
    }*/
}

    

