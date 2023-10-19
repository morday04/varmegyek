<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Cassis;

class CassissesTableSeeder extends Seeder
{
    
    const ITEMS = [
        'SUV',
        'SPORT SUV',
        'COUPÉ',
        'CABRIO',
        'SEDAN',

    ];
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (self::ITEMS as $item) {
            $entity = new Cassis(['name' => $item]);
            $entity->save();
        }
    }
}
