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
             'email' => 'kovacsadel12@gmail.com',
             'is_admin' => true,
         ]);

         Expenditure::factory(100)->create();
         Income::factory(100)->create();

    }
}
