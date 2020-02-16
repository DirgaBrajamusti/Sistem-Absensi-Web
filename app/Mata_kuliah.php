<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mata_kuliah extends Model
{
    protected $table = "mata_kuliah";
    protected $fillable = [
        'nama_mata_kuliah',
        'jam_mulai',
        'jam_selesai',
        'dosen_id'
    ];
    public $timestamps = false;

    public function dosen() {
        return $this->belongsTo('App\Dosen');
    }
    public function absensi(){
        return $this->hasMany('App\Absensi');
    }
}
