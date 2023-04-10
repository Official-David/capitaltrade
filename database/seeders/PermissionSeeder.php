<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name' => 'Can edit packages']);
        Permission::create(['name' => 'Can edit user status and role)']);
        Permission::create(['name' => 'Can approve deposits)']);
        Permission::create(['name' => 'Can approve withdrawals)']);
        Permission::create(['name' => 'Can add crypto (name, address, qr_code))']);
        Permission::create(['name' => 'Can edit crypto (name, address, qr_code)']);
        Permission::create(['name' => 'Can delete crypto (name, address, qr_code)']);
        Permission::create(['name' => 'Can change password)']);
    }
}
