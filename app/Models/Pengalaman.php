<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengalaman extends Model
{
    protected $table = 'pengalaman_kerja';
    protected $fillable = ['nik','posisi','nm_perusahaan','jangka_kerja'];

    public function pelamar()
    {
      return $this->hasMany('App\Models\Pelamar', 'id_pengalaman','id');
    }
}
