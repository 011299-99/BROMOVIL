<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * Campos asignables en masa.
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'phone',
        'email',
        'password',
    ];

    /**
     * Ocultos en serialización.
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Casts.
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed', // Hash automático al crear/actualizar
        ];
    }

    /**
     * Accessor para $user->name (compatibilidad con vistas/partials antiguos).
     */
    public function getNameAttribute(): string
    {
        return trim(($this->first_name ?? '').' '.($this->last_name ?? ''));
    }

    /**
     * Incluir "name" también en toArray()/JSON.
     */
    protected $appends = ['name'];
}
