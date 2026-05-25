<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        Role::firstOrCreate([
            'name' => 'staff',
            'guard_name' => 'web'
        ]);

        Role::firstOrCreate([
            'name' => 'dosen',
            'guard_name' => 'web'
        ]);

        Role::firstOrCreate([
            'name' => 'mahasiswa',
            'guard_name' => 'web'
        ]);
    }
}