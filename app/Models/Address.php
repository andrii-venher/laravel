<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function producers()
    {
        return $this->hasMany(Producer::class);
    }

    public function suppliers()
    {
        return $this->hasMany(Supplier::class);
    }
}
