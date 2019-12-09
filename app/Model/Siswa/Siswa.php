<?php

namespace App\Model\Siswa;

use Illuminate\Database\Eloquent\Model;
use App\Model\Siswa\Jurusan;

class Siswa extends Model
{
    protected $table = "tb_siswa";

    protected $fillable = [
        'nis', 'nama_siswa', 'kelas', 'email', 'jenis_kelamin', 'jurusan', 'alamat', 'no_hp', 'verified'
    ];

    public function jurusanSiswa()
    {
        return $this->belongsTo(Jurusan::class, 'jurusan', 'id_jurusan');
    }
}
