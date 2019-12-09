<?php

namespace App\Model\Guru;

use Illuminate\Database\Eloquent\Model;

class Prodi extends Model
{
    protected $table = "tb_mapel";

    public function Daftarjurusan()
    {
        return $this->belongsTo('App\Model\Guru\Guru', 'id');
    }
}
