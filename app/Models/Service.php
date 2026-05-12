<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'name',
        'image',
        'duration',
        'price',
        'description',
        'status',
    ];

    // Relación: un servicio pertenece a una categoría
    public function category()
    {
        return $this->belongsTo(ServiceCategory::class, 'category_id');
    }
    protected $casts = [
    'status' => 'boolean',
    ];
    public function galleries()
{
    return $this->hasMany(Gallery::class);
}
}