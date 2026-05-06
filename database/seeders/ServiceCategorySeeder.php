<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ServiceCategory;
use Illuminate\Support\Str;

class ServiceCategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Manicure',
                'description' => 'Servicios de cuidado y esmaltado de uñas de manos',
            ],
            [
                'name' => 'Pedicure',
                'description' => 'Servicios de cuidado y esmaltado de uñas de pies',
            ],
            [
                'name' => 'Uñas Acrílicas',
                'description' => 'Extensiones y diseño con acrílico',
            ],
            [
                'name' => 'Uñas en Gel',
                'description' => 'Aplicación de gel y esmaltado semipermanente',
            ],
            [
                'name' => 'Nail Art',
                'description' => 'Diseños y decoraciones personalizadas',
            ],
            [
                'name' => 'Mantenimiento',
                'description' => 'Relleno y retoque de uñas',
            ],
            [
                'name' => 'Retiro de Uñas',
                'description' => 'Remoción de acrílico, gel o esmalte',
            ],
            [
                'name' => 'Tratamientos',
                'description' => 'Cuidado, hidratación y fortalecimiento',
            ],
        ];

        foreach ($categories as $category) {
            ServiceCategory::updateOrCreate(
                ['name' => $category['name']],
                [
                    'name' => $category['name'],
                    'description' => $category['description'],
                    'image' => null, 
                    'status' => true,
                ]
            );
        }
    }
}