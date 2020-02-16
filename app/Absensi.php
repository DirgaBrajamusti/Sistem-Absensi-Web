<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    protected $table = "absensi";
    protected $fillable = [
        'npm',
        'kelas_id',
        'mata_kuliah_id',
        'minggu'
    ];

    public function kelas() {
        return $this->belongsTo('App\Kelas');
    }
    
    public function mata_kuliah() {
        return $this->belongsTo('App\Mata_kuliah');
    }
}
