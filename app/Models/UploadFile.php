<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UploadFile extends Model
{
    protected $fillable = ['nik', 'cv','foto','ktp','kk','ijazah'];

    public function uploadfile()
    {
        return $this->belongsTo('App\Models\Pelamar' , 'nik');
    }
}
