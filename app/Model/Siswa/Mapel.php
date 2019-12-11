<?php

namespace App\Model\Siswa;

use Illuminate\Database\Eloquent\Model;
use App\Model\Siswa\Siswa;


class Mapel extends Model
{
    protected $table = "tb_mapel";

    public function Mapel()
    {
        return $this->belongsTo(Siswa::class, 'id');
    }
}
