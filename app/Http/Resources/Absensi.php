<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Absensi extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'npm' => $this->npm,
            'kelas_id' => $this->kelas_id,
            'mata_kuliah_id' => $this->mata_kuliah_id,
            'minggu' => $this->minggu
        ];
    }
}
