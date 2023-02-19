<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create([
            'name' => 'user index'
        ]);

        Permission::create([
            'name' => 'user create'
        ]);

        Permission::create([
            'name' => 'user edit'
        ]);

        Permission::create([
            'name' => 'user delete'
        ]);

        Permission::create([
            'name' => 'roles index'
        ]);

        Permission::create([
            'name' => 'roles edit'
        ]);

        Permission::create([
            'name' => 'roles update'
        ]);

        Permission::create([
            'name' => 'roles delete'
        ]);
    }
}
