<?php

namespace App\Models;

use DB;
use \Apps\Models\Seleksi;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $table = 'activity';
    protected $fillable = ['nik','id_seleksi','hasil','keterangan','tgl_panggilan','tanggal'];
    protected $dates = ['created_at','updated_at'];


    public function seleksi()
    {
      return $this->hasMany('App\Models\Seleksi', 'id','id_seleksi');
    }
}
