<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as EloquentModel;

class Vehicle extends EloquentModel
{
    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function manufacturer()
    {
        return $this->belongsTo(Manufacturer::class);
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function fuel()
    {
        return $this->belongsTo(Fuel::class);
    }
}
