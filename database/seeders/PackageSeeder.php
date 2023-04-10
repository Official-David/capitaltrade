<?php

namespace Database\Seeders;

use App\Models\Package;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Package::create([
            'name' => 'Basic',
            'duration' => 2,
            'minimum_deposit' => 1000,
            'maximum_deposit' => 4999,
            'roi' => 10,
        ]);

        Package::create([
            'name' => 'Silver',
            'duration' => 3,
            'minimum_deposit' => 5000,
            'maximum_deposit' => 9999,
            'roi' => 20,
        ]);

        Package::create([
            'name' => 'Gold',
            'duration' => 4,
            'minimum_deposit' => 10000,
            'maximum_deposit' => 14999,
            'roi' => 30,
        ]);

        Package::create([
            'name' => 'Premium',
            'duration' => 5,
            'minimum_deposit' => 15000,
            'maximum_deposit' => 20000,
            'roi' => 40,
        ]);
    }
}
