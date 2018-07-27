<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UploadFile extends Model
{
    protected $table = 'upload_file';

    protected $fillable = ['nik', 'cv','foto','ktp','kk','ijazah','srt_pengalaman'];

    public function uploadfile()
    {
        return $this->belongsTo('App\Models\Pelamar' , 'nik');
    }
}
