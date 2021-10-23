<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function producer()
    {
        return $this->belongsTo(Producer::class);
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

    public function discount()
    {
        return $this->belongsTo(Discount::class);
    }

    public function deliveries()
    {
        return $this->hasMany(Delivery::class);
    }

    public function sales()
    {
        return $this->hasMany(Sale::class);
    }
}
