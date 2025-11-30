<?php

namespace Hanafalah\ModuleAnatomy\Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        echo "[DEBUG] Booting ".class_basename($this)."\n";
        $this->call([
            AnatomySeeder::class
        ]);
    }
}
