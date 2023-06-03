<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Package;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(100)->create();

        $admin_role = Role::create(['name' => 'admin']);

        $admin_user = \App\Models\User::factory()->create([
            'name' => 'Super Admin',
            'email' => 'test@example.com',
        ]);

        $admin_user->assignRole('admin');

        $this->call([
            PlatformSeeder::class,
            PlatformCssSelectorSeeder::class,
            PackageSeeder::class,
            ServerSeeder::class,
            ContentSeeder::class,
        ]);


    }




}
