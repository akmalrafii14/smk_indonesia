<?php

namespace App\Model\Siswa;

use Illuminate\Database\Eloquent\Model;


class Jurusan extends Model
{
    protected $table = "tb_jurusan";

    public function Daftarjurusan()
    {
        return $this->belongsTo('App\Model\Siswa\Siswa', 'id_jurusan');
    }
}
