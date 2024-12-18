<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'description',
        'image'
    ];

    public function items()
    {
        return $this->hasMany(Item::class);
    }
}