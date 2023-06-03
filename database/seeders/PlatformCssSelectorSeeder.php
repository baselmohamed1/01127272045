<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PlatformCssSelector;

class PlatformCssSelectorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PlatformCssSelector::create([
            'platform_id' => 1,
            'css_selector' => '.List--Download--Wecima--Single li',
            'media_type' => 'movie',
        ]);
    }
}
