<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'phone',
        'email',
        'notes',
    ];

    // Accesor para nombre completo (opcional pero útil)
    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }
}