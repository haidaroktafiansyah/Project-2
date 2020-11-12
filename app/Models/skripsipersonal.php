<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class skripsipersonal extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'skripsi_personal';
    protected $primaryKey = 'id_skripsi';

    protected $fillable = [
        'judul',
        'file',
        'id_admin',
        'id_mahasiswa',
        'tema',
    ];
}
