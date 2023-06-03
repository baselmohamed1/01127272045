<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::find(1);

        $user->contents()->create([
            'platform_id' => 1,
            'server_id' => 1,
            'content_name' => 'Test Content',
            'url' => 'watch/مشاهدة-مسلسل-i-think-you-should-leave-with-tim-robinson-موسم-3-حلقة-4/',
            'folder_path' => '/home/test',
            'media_type' => 'movie',
        ]);
    }
}
