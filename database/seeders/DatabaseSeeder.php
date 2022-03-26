<?php

namespace Database\Seeders;

use App\Models\Sauna;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Sauna::factory()
            ->hasLocation()
            ->hasOpening()
            ->count(10)
            ->create();
    }
}
