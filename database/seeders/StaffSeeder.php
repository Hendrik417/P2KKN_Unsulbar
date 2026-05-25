<?php

namespace Database\Seeders;

use App\Models\User;

use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;

class StaffSeeder extends Seeder
{
    public function run(): void
    {
        $role = Role::firstOrCreate([
            'name' => 'staff'
        ]);


        $user = User::firstOrCreate(

            [
                'email' => 'staff@gmail.com'
            ],

            [
                'name' => 'Staff',
                'password' => bcrypt(
                    '123456'
                )
            ]
        );


        if (
            ! $user->hasRole(
                'staff'
            )
        ) {

            $user->assignRole(
                $role
            );

        }


        if (
            ! $user->staff
        ) {

            $user->staff()->create([

                'nik' =>
                    '1234567890123456',

                'nama_lengkap' =>
                    'Staff Admin',

                'jenis_kelamin' =>
                    'L',

                'alamat' =>
                    'Sulawesi Selatan',

                'tempat_lahir' =>
                    'Makassar',

                'tanggal_lahir' =>
                    '2000-01-01',

                'no_hp' =>
                    '081234567890',

                'foto' =>
                    'default.png',

            ]);

        }
    }
}