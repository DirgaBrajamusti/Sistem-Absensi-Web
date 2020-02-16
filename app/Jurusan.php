<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    protected $table = "jurusan";
    protected $fillable = ['nama_jurusan'];
    public $timestamps = false;

    public function kelas() {
        return $this->hasMany('App\Kelas');
    }
    public function dosen() {
        return $this->hasMany('App\Dosen');
    }
}
