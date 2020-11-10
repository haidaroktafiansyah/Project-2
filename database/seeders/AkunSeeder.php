<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class AkunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'username' => 'admin',
                'email' => 'admin@mail.com',
                'password' => bcrypt('admin'),
                'level' => 'admin',
                'kontak' => '081216757357',
                'nama' => 'admin',
                'id_identitas' => '1',
                'id_skripsi' => '1',
            ],
            [
                'username' => 'admin2',
                'email' => 'admin2@mail.com',
                'password' => 'admin',
                'level' => 'admin',
                'kontak' => '081216757357',
                'nama' => 'admin',
                'id_identitas' => '1',
                'id_skripsi' => '1',
            ],
            [
                'username' => 'siswa',
                'email' => 'siswa@mail.com',
                'password' => bcrypt('siswa'),
                'level' => 'siswa',
                'kontak' => '081216757357',
                'nama' => 'siswa',
                'id_identitas' => '2',
                'id_skripsi' => '2',
            ]
            ];
            foreach($user as $key => $value){
                User::create($value);
            }
    }
}
