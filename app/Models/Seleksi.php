<?php

namespace App\Models;
use \Apps\Models\Activity;

use Illuminate\Database\Eloquent\Model;

class Seleksi extends Model
{
    protected $table = 'jns_tes';
    protected $fillable = ['nama_tes'];

    public function activity()
    {
      return $this->belongsTo('App\Models\Activity', 'id_seleksi','id');
    }

}
