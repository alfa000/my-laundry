<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = \App\Models\User::create([
            'username' => 'revaldi',
            'password' => bcrypt('revaldi123'),
            'nama' => 'Revaldi',
            'peran' => 'manajer',
            'jenis_kelamin' => 'l',
        ]);

        \App\Models\Karyawan::create([
            'tgl_lahir' => '2001-03-24',
            'karyawan_sejak' => date('Y-m-d'),
            'id_user' => $user->id_user,
        ]);

        $user = \App\Models\User::create([
            'username' => 'adnan',
            'password' => bcrypt('adnan123'),
            'nama' => 'Adnan',
            'peran' => 'kasir',
            'jenis_kelamin' => 'l',
        ]);

        \App\Models\Karyawan::create([
            'tgl_lahir' => '2001-03-24',
            'karyawan_sejak' => date('Y-m-d'),
            'id_user' => $user->id_user,
        ]);

        $user = \App\Models\User::create([
            'username' => 'ilham',
            'password' => bcrypt('ilham123'),
            'nama' => 'Ilham Assidiq',
            'peran' => 'pelanggan',
            'jenis_kelamin' => 'l',
        ]);

        \App\Models\Pelanggan::create([
            'no_hp' => '081231331221',
            'alamat' => 'jl. pelabuhan 2 atas sukabumi',
            'id_user' => $user->id_user,
        ]);
    }
}
