<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessSetting extends Model
{
    use HasFactory;

    protected $table = 'business_settings';

    protected $fillable = [
        'business_name',
        'logo',
        'address',
        'district',
        'city',
        'reference',
        'phone',
        'whatsapp',
        'email',
        'google_maps_url',
        'latitude',
        'longitude',
        'opening_hours',
        'facebook',
        'instagram',
        'tiktok',
        'about_text',
    ];
}