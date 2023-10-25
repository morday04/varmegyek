<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Type;
use App\Models\Vehicle;

class Manufacturer extends Model
{
    protected $table = 'manufacturers';
    use HasFactory;

    public function vehicles()
    {
        return $this->hasMany(Vehicle::class);
    }

    public function types()
    {
        return $this->hasMany(Type::class);
    }
}
