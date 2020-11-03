<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mahasiswaSkripsi extends Model
{
    use HasFactory;
    protected $table = 'skripsi_personal';
    protected $primaryKey = 'id_skripsi';
}
