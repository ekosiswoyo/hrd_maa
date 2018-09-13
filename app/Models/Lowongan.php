<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lowongan extends Model
{
    protected $table = 'lowongan';
    protected $fillable = ['nama_lowongan'];
        protected $dates = ['created_at','updated_at'];


    public function pelamar()
  {
    return $this->hasMany('App\Models\Pelamar', 'id_lowongan','id');
  }

}
