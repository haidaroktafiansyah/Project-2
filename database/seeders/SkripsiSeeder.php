<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\skripsipersonal;

class SkripsiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'judul' => 'semongko',
                'tema' => 'buah',
                'id_admin' => '1',
                'id_mahasiswa' => '4',
            ],
            [
                'judul' => 'gedang',
                'tema' => 'buah',
                'id_admin' => '1',
                'id_mahasiswa' => '5',
            ],
            ];
            foreach($data as $key => $value){
                skripsipersonal::create($value);
            }
    }
}
