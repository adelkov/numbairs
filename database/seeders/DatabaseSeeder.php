<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Expenditure;
use App\Models\Income;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         \App\Models\User::factory()->create([
             'name' => 'Adel Kovacs',
             'email' => 'adel@duck.com',
         ]);

         Expenditure::factory(100)->create();
         Income::factory(100)->create();

    }
}
