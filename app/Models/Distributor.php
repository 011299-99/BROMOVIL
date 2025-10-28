<?php

// app/Models/Distributor.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Distributor extends Model
{
    protected $fillable = [
        'user_id','display_name','code','whatsapp',
        'active_lines','month_commission','sipab_balance',
        'receive_push','receive_email',
    ];

    protected $casts = [
        'active_lines'     => 'integer',
        'month_commission' => 'integer',
        'sipab_balance'    => 'integer',
        'receive_push'     => 'boolean',
        'receive_email'    => 'boolean',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

   
    public function getDisplayNameOrUserAttribute(): string
    {
        return $this->display_name ?: ($this->user?->name ?? '');
    }
}
