<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CartItem extends Model
{
    protected $fillable = ['cart_id', 'sku', 'title', 'qty', 'price', 'subtotal'];

    protected $casts = [
        'price'    => 'decimal:2',
        'subtotal' => 'decimal:2',
    ];

    public function cart(): BelongsTo
    {
        return $this->belongsTo(Cart::class);
    }
}
