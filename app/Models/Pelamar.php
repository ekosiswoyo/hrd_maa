<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pelamar extends Model
{
    protected $table = 'pelamar';
    protected $fillable = ['nik','nama','tempat_lahir','tanggal_lahir','jns_kel','stat_pernikahan','id_lowongan','alamat_ktp','alamat_domisili',
    'telp','hp','pend_terakhir','id_pengalaman','tgl_masuk_lamaran','tgl_masuk_kerja','status_akhir'];
    protected $dates = ['created_at','updated_at'];

    public function lowongan()
    {
      return $this->belongsTo('App\Models\Lowongan', 'id_lowongan','id');
    }
    public function pengalaman()
    {
      return $this->belongsTo('App\Models\Pengalaman', 'id_pengalaman','id');
    }

}
