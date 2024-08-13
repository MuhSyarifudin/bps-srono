<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\JenisKomoditas;
use App\Models\SektorPertanian;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        // $this->call([
        //     PeriodeSeeder::class,
        //     SektorPertanianSeeder::class,
        //     JenisKomoditasSeeder::class,
        //     UserSeeder::class
        // ]);
        $this->call([
            SektorSeeder::class,
            JenisKomoditasSeeder::class,
            KomoditasSeeder::class,
            UserSeeder::class,
            PeriodeSeeder::class
        ]);
    }
}
