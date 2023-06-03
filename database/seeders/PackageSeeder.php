<?php

namespace Database\Seeders;
// use App\Models\Package;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Package::create([
            
                'name' => 'Classic',                
                'price' => 75,
                'content_count' => 35,
                'server_count' => 1,
                'paypal_plan_id' => 'P-5K969791CB186511VMRN2KJA',
                'type' => 'subscription'
                
        ]);
        
        \App\Models\Package::create([
            
                'name' => 'Extra',                
                'price' => 100,
                'content_count' => 50,
                'server_count' => 2,
                'paypal_plan_id' => 'P-1YG15876UM299950XMROSUQY',
                'type' => 'subscription'
        ]);

        \App\Models\Package::create([
            
                'name' => 'Premium',                
                'price' => 150, 
                'content_count' => 75,
                'server_count' => 4,
                'paypal_plan_id' => 'P-5D9703002V707822MMROSU3I',
                'type' => 'subscription'
                ]);

        \App\Models\Package::create([
            
                'name' => 'Content',                
                'price' => 75, 
                'content_count' => 75,
                'server_count' => 0,
                'paypal_plan_id' => 'P-5D9703002V707822MMROSU3I',
                'type' => 'addon'
                ]);

        \App\Models\Package::create([
            
                'name' => 'Server',                
                'price' => 100, 
                'content_count' => 0,
                'server_count' => 4,
                'paypal_plan_id' => 'P-1YG15876UM299950XMROSUQY',
                'type' => 'addon'
                ]);

        // foreach ($packages as $package) {
        //     Package::create($package);
        // }
    }

   
}
