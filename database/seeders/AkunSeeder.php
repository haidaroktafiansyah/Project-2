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
                'username' => 'dosen',
                'email' => 'dosen@mail.com',
                'password' => bcrypt('dosen'),
                'level' => 'dosen',
                'kontak' => '081216757357',
                'nama' => 'dosen',
                'id_identitas' => '1',
                'id_skripsi' => '1',
            ],
            [
                'username' => 'dosen2',
                'email' => 'dosen2@mail.com',
                'password' => bcrypt('dosen'),
                'level' => 'dosen',
                'kontak' => '081216757357',
                'nama' => 'dosen',
                'id_identitas' => '2',
                'id_skripsi' => '2',
            ],
            [
                'username' => 'dosen3',
                'email' => 'dosen3@mail.com',
                'password' => bcrypt('dosen'),
                'level' => 'dosen',
                'kontak' => '081216757357',
                'nama' => 'dosen',
                'id_identitas' => '3',
                'id_skripsi' => '3',
            ]
            ];
            foreach($user as $key => $value){
                User::create($value);
            }
    }
}
