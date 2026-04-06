<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'phone',
        'specialty',
        'commission',
        'status',
        'work_start',
        'work_end',
        'days_off',
    ];

    /**
     * Casts automáticos
     */
    protected $casts = [
        'days_off' => 'array',        // JSON → array
        'work_start' => 'datetime:H:i',
        'work_end' => 'datetime:H:i',
        'status' => 'boolean',
        'commission' => 'decimal:2',
    ];

    /**
     * Relación con usuarios
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}