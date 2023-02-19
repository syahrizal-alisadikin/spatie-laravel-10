<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name' => "Syahrizal As",
            'email' => "izal@gmail.com",
            'password' => Hash::make("password")
        ]);

        $permission = Permission::all();

        $role = Role::find(1);

        // memasukan semua permission ke dalam roles
        $role->syncPermissions($permission);

        // mamasukan role ke dalam user
        $user->assignRole($role);
    }
}
