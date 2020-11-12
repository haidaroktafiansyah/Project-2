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
                'username' => 'aldi',
                'email' => 'aldi@mail.com',
                'password' => bcrypt('aldi'),
                'level' => 'mahasiswa',
                'kontak' => '081216757357',
                'nama' => 'Aldi',
                'id_identitas' => '1',
                'id_skripsi' => '1',
            ]
            ];
            foreach($user as $key => $value){
                User::create($value);
            }
    }
}
