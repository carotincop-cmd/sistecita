<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            RoleModuleSeeder::class,
            SuperAdminSeeder::class,
            ServiceCategorySeeder::class,
            ServiceSeeder::class,
            
        ]);
    }
}