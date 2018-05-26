<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengalaman extends Model
{
    protected $table = 'pengalaman_kerja';
    protected $fillable = ['nik','posisi','nm_perusahaan','jangka_kerja'];
}
