<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KaryawanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = \App\Models\User::create([
            'username' => 'adnan',
            'password' => bcrypt('adnan123'),
            'nama' => 'Adnan Al-farizi Rahmat',
            'peran' => 'manajer',
            'jenis_kelamin' => 'l',
        ]);

        \App\Models\Karyawan::create([
            'tgl_lahir' => '2001-03-24',
            'karyawan_sejak' => date('Y-m-d'),
            'id_user' => $user->id_user,
        ]);

        $user = \App\Models\User::create([
            'username' => 'adnan_kasir',
            'password' => bcrypt('adnan123'),
            'nama' => 'Adnan Al-farizi Rahmat',
            'peran' => 'kasir',
            'jenis_kelamin' => 'l',
        ]);

        \App\Models\Karyawan::create([
            'tgl_lahir' => '2001-03-24',
            'karyawan_sejak' => date('Y-m-d'),
            'id_user' => $user->id_user,
        ]);
    }
}
