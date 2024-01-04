<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use App\Models\Varmegye;

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

    public function handle()
    {
        $fileName=$this->argument('fileName');
        $csvData= $this->getCsvData($fileName);
        $counties = $this->getCounties($csvData);
        $this -> turncate($counties);
        foreach($counties as $county)
        {
            Varmegye::create(["name"=>$county]);
        }
        //var_dump($counties);
        //return 0;
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
            $line=fgetcsv($csvFile);
            $lines[] = $line;
            //var_dump($lines);
        }
        fclose($csvFile);

        return $lines;
    }

    private function getCounties($csvData)
    {  
        $county="";
        $result=[];
        foreach($csvData as $data)
        {
            if(!is_array($data))
            {
                continue;
            }
            if($data[0]!=$county)
            {
                $result[]=$data[0];
                $county=$data[0];
            }
        }
        return $result;
    }
    private function turncate ($table)
    {
        try
        {
            DB::statement("TURNCATE TABLE $table;");
            $this->info("$table table has been turncated.");
        }
        catch(Exeption $e)
        {
            $this->error($e->getMessage());
        }
    }
}

    

