<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // Asegúrate de tener estos campos en tu migración de products
    protected $fillable = ['sku', 'title', 'price', 'type'];

    protected $casts = [
        'price' => 'decimal:2',
    ];
}
