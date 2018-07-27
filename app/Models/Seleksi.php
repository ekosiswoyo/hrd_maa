<?php

namespace App\Models;
use \Apps\Models\Activity;

use Illuminate\Database\Eloquent\Model;

class Seleksi extends Model
{
    protected $table = 'jns_tes';
    protected $fillable = ['nama'];

    public function activity()
    {
      return $this->belongsTo('App\Models\Activity', 'id_seleksi','id');
    }

}
