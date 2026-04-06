<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;
use App\Models\ServiceCategory;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        $services = [
            // MANICURE
            [
                'category' => 'Manicure',
                'name' => 'Manicure básica',
                'description' => 'Limpieza, limado y esmaltado',
                'price' => 25,
                'duration' => 30,
                'status' => 'active'
            ],
            [
                'category' => 'Manicure',
                'name' => 'Manicure spa',
                'description' => 'Incluye exfoliación e hidratación',
                'price' => 40,
                'duration' => 45,
                'status' => 'active'
            ],

            // PEDICURE
            [
                'category' => 'Pedicure',
                'name' => 'Pedicure básica',
                'description' => 'Limpieza y esmaltado de pies',
                'price' => 35,
                'duration' => 40,
                'status' => 'active'
            ],
            [
                'category' => 'Pedicure',
                'name' => 'Pedicure spa',
                'description' => 'Incluye masaje y exfoliación',
                'price' => 55,
                'duration' => 60,
                'status' => 'active'
            ],

            // UÑAS ACRÍLICAS
            [
                'category' => 'Uñas Acrílicas',
                'name' => 'Acrílicas completas',
                'description' => 'Aplicación completa con diseño básico',
                'price' => 90,
                'duration' => 90,
                'status' => 'active'
            ],
            [
                'category' => 'Uñas Acrílicas',
                'name' => 'Retoque acrílico',
                'description' => 'Mantenimiento de crecimiento',
                'price' => 60,
                'duration' => 60,
                'status' => 'active'
            ],

            // UÑAS GEL
            [
                'category' => 'Uñas Gel',
                'name' => 'Esmaltado en gel',
                'description' => 'Esmaltado semipermanente',
                'price' => 50,
                'duration' => 45,
                'status' => 'active'
            ],
            [
                'category' => 'Uñas Gel',
                'name' => 'Retiro de gel',
                'description' => 'Remoción segura del gel',
                'price' => 20,
                'duration' => 20,
                'status' => 'active'
            ],

            // NAIL ART
            [
                'category' => 'Nail Art',
                'name' => 'Diseño básico',
                'description' => 'Decoración simple por uña',
                'price' => 10,
                'duration' => 15,
                'status' => 'active'
            ],
            [
                'category' => 'Nail Art',
                'name' => 'Diseño personalizado',
                'description' => 'Arte avanzado y personalizado',
                'price' => 30,
                'duration' => 30,
                'status' => 'active'
            ],

            // TRATAMIENTOS
            [
                'category' => 'Tratamientos',
                'name' => 'Hidratación profunda',
                'description' => 'Tratamiento nutritivo para uñas',
                'price' => 35,
                'duration' => 30,
                'status' => 'active'
            ],
            [
                'category' => 'Tratamientos',
                'name' => 'Fortalecimiento de uñas',
                'description' => 'Tratamiento endurecedor',
                'price' => 40,
                'duration' => 35,
                'status' => 'active'
            ],
        ];

        foreach ($services as $item) {

            $category = ServiceCategory::where('name', $item['category'])->first();

            if ($category) {
                Service::create([
                    'category_id' => $category->id,
                    'name' => $item['name'],
                    'description' => $item['description'],
                    'price' => $item['price'],
                    'duration' => $item['duration'],
                    'status' => true,
                ]);
            }
        }
    }
}