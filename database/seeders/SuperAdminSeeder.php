<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class SuperAdminSeeder extends Seeder
{
    public function run(): void
    {
        // 🔹 Obtener roles
        $superAdminRole = Role::where('slug', 'super_admin')->first();
        $adminRole = Role::where('slug', 'admin')->first();
        $staffRole = Role::where('slug', 'staff')->first();
        $recepcionRole = Role::where('slug', 'recepcion')->first();

        // 🔹 Crear usuarios

        // Super Admin
        User::updateOrCreate(
            ['email' => 'superadmin@admin.com'],
            [
                'name' => 'Super Admin',
                'password' => Hash::make('12345678'),
                'role_id' => $superAdminRole->id,
                'status' => true,
            ]
        );

        // Admin
        User::updateOrCreate(
            ['email' => 'admin@admin.com'],
            [
                'name' => 'Admin',
                'password' => Hash::make('12345678'),
                'role_id' => $adminRole->id,
                'status' => true,
            ]
        );

        // Staff
        User::updateOrCreate(
            ['email' => 'staff@admin.com'],
            [
                'name' => 'Staff',
                'password' => Hash::make('12345678'),
                'role_id' => $staffRole->id,
                'status' => true,
            ]
        );

        // Recepción
        User::updateOrCreate(
            ['email' => 'recepcion@admin.com'],
            [
                'name' => 'Recepción',
                'password' => Hash::make('12345678'),
                'role_id' => $recepcionRole->id,
                'status' => true,
            ]
        );
    }
}