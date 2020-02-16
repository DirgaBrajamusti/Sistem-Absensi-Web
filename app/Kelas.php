<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $table = "kelas";
    public $timestamps = false;
    protected $fillable = [
        'nama_kelas', 
        'jurusan_id'
    ];

    public function jurusan() {
        return $this->belongsTo('App\Jurusan');
    }
    public function absensi(){
        return $this->hasMany('App\Absensi');
    }
}
