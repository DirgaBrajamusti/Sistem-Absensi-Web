<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    protected $table = "dosen";
    protected $fillable = [
        'nama_dosen',
        'jurusan_id',
        'mata_kuliah_id'
    ];
    public $timestamps = false;

    public function jurusan() {
        return $this->belongsTo('App\Jurusan');
    }
    
    public function mata_kuliah() {
        return $this->hasMany('App\Mata_kuliah');
    }
}
