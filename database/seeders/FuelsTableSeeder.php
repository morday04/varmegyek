<?php

namespace Database\Seeders;

use App\Models\Fuel;
use App\Models\VehicleCategory;
use Illuminate\Database\Seeder;

class FuelsTableSeeder extends Seeder
{

    const ITEMS = [
        'benzin',
        'dízel',
        'benzin/lpg',
        'benzin/cng',
        'dízel/lpg',
        'dízel/cng',
        'hibrid (benzin)',
        'hibrid (dízel)',
        'elektromos',
        'etanol',
        'biodízel',
        'LPG',
        'CNG',
        'hidrogén',

    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (self::ITEMS as $item) {
            $entity = new Fuel(['name' => $item]);
            $entity->save();
        }
    }

}
