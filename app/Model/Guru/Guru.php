<?php

namespace App\Model\Guru;

use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    protected $table = "tb_guru";

    protected $fillable = [
        'nip', 'nama', 'email', 'password', 'prodi', 'jenis_kelamin', 'no_hp', 'alamat'
    ];

    public function ProdiGuru()
    {
        return $this->belongsTo(Prodi::class, 'prodi', 'id'); //field prodi ambil dari tb_guru, id ambil di tb_mapel
    }
}
