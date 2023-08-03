<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Platform;

class PlatformSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Platform::create([
            'domain' => 'https://wecima.dev/'
        ]);

        Platform::create([
            'domain' => 'https://akw.to/'
        ]);
    }
}
