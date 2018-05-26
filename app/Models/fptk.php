<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class fptk extends Model
{
    protected $table = 'fptk';
    protected $fillable = ['id','id_bagian','grade','jml_sdm','id_cabang','keperluan','ket_keperluan','status_karyawan','jns_kel',
    'stat_pernikahan','pend','pengalaman_kerja','min_pengalaman','syarat_wajib','syarat_dukung','uraian_tugas',
    'karakteristik','status'];
    protected $dates = ['created_at'];

    public function user()
    {
      return $this->belongsTo('App\User', 'id_user','id');
    }
    public function bagian()
    {
      return $this->belongsTo('App\Models\Bagian', 'id_bagian','id_bagian');
    }
    public function cabang()
    {
      return $this->belongsTo('App\Models\Cabang', 'id_cabang','id_cabang');
    }
}
