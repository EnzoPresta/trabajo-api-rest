<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        \App\Models\Auto::factory(50)->create();
        \App\Models\Auto::factory(1)->create(
            [ "id" => 10000]
        );
        \App\Models\Auto::factory(1)->create(
            [ "id" => 10001]
        );
        \App\Models\Auto::factory(1)->create(
            [ "id" => 10002]
        );
    }
}
