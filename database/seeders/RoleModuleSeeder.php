<?php

namespace Database\Seeders;

use App\Models\Module;
use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleModuleSeeder extends Seeder
{
    public function run(): void
    {
        $modules = [
            ['name' => 'Dashboard', 'slug' => 'dashboard'],
            ['name' => 'Gestión de Roles', 'slug' => 'roles'],
            ['name' => 'Gestión de Usuarios', 'slug' => 'users'],
            ['name' => 'Empleados', 'slug' => 'employees'],
            ['name' => 'Clientes', 'slug' => 'clients'],
            ['name' => 'Categorías de Servicios', 'slug' => 'service-categories'],
            ['name' => 'Servicios', 'slug' => 'services'],
            ['name' => 'Citas', 'slug' => 'appointments'],
        ];

        foreach ($modules as $module) {
            Module::updateOrCreate(
                ['slug' => $module['slug']],
                $module
            );
        }

        $superAdmin = Role::updateOrCreate(
            ['slug' => 'super_admin'],
            [
                'name' => 'Super Admin',
                'description' => 'Acceso total al sistema',
                'status' => true,
            ]
        );

        $admin = Role::updateOrCreate(
            ['slug' => 'admin'],
            [
                'name' => 'Admin',
                'description' => 'Acceso a casi todo menos roles',
                'status' => true,
            ]
        );

        $staff = Role::updateOrCreate(
            ['slug' => 'staff'],
            [
                'name' => 'Staff',
                'description' => 'Acceso operativo',
                'status' => true,
            ]
        );

        $recepcion = Role::updateOrCreate(
            ['slug' => 'recepcion'],
            [
                'name' => 'Recepción',
                'description' => 'Atención y citas',
                'status' => true,
            ]
        );

        $allModules = Module::pluck('id')->toArray();

        $superAdmin->modules()->sync($allModules);

        $admin->modules()->sync(
            Module::whereIn('slug', [
                'dashboard',
                'users',
                'employees',
                'clients',
                'services',
                'appointments',
                'service-categories',
            ])->pluck('id')->toArray()
        );

        $staff->modules()->sync(
            Module::whereIn('slug', [
                'dashboard',
                'clients',
                'services',
                'appointments',
                'service-categories',
            ])->pluck('id')->toArray()
        );

        $recepcion->modules()->sync(
            Module::whereIn('slug', [
                'dashboard',
                'clients',
                'appointments',
            ])->pluck('id')->toArray()
        );
    }
}