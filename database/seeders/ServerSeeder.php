<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Server;
use App\Models\User;

class ServerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::find(1);

        $user->servers()->create([
            'server_name' => 'Test Server',
            'ssh_host_name' => '88.198.184.11',
            'ssh_user_name' => 'root',
            'ssh_password' => 'kNehaPpuaTCnwRaqjEL9',
        ]);
    }
}
