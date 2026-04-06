<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'role_id',
        'name',
        'email',
        'password',
        'status',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'status' => 'boolean',
        ];
    }

    // 🔹 Relación con el rol
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    // 🔹 Relación con empleado (IMPORTANTE para crear/editar empleados)
    public function employee()
    {
        return $this->hasOne(Employee::class);
    }

    // 🔹 Validación de acceso a módulos
    public function hasModuleAccess(string $moduleSlug): bool
    {
        if (!$this->role || !$this->status) {
            return false;
        }

        return $this->role->modules()
            ->where('slug', $moduleSlug)
            ->where('status', true)
            ->exists();
    }
}