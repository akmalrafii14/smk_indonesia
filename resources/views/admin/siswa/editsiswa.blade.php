@extends('layouts.app')
@extends('layouts.sidebar')
@section('content')

<div id="content">
    <div class="container py-4">
        <div class="card">
            <div class="card-body">
                    <h3>Edit Data Siswa</h3>
                    <p>Masukkan Data dengan Benar</p>
                <a href="/admin/updatedatasiswa/{{$datasiswa->id}}">Cek</a>
                <form  action="/admin/updatedatasiswa/{{$datasiswa->id}}" method="POST" id="formSiswa">
                    @csrf
                    {{ method_field('PUT') }}
                    <div class="form-group row">
                        <label for="email"
                            class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                        <div class="col-md-7">
                            <input id="email" type="email" class="form-control" name="email" required value="{{$datasiswa->email}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nis"
                            class="col-md-4 col-form-label text-md-right">{{ __('Nomor Induk Siswa') }}</label>

                        <div class="col-md-7">
                            <input id="text" type="text" class="form-control" name="nis" required value="{{$datasiswa->nis}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nama" class="col-md-4 col-form-label text-md-right">{{ __('Nama Lengkap') }}</label>

                        <div class="col-md-7">
                            <input id="text" type="text" class="form-control" name="name" required value="{{$datasiswa->nama_siswa}}" autocomplete="name">


                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nis" class="col-md-4 col-form-label text-md-right">{{ __('Jenis Kelamin') }}</label>

                        <div class="col-md-7">
                        <select name="jeniskelamin" id="" class="form-control" value="{{$datasiswa->jenis_kelamin}}">
                                <option disabled>Pilih Jenis
                                    Kelamin</option>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="nis" class="col-md-4 col-form-label text-md-right">{{ __('Kelas') }}</label>

                        <div class="col-md-7">
                            <select name="kelas" id="" class="form-control" value="{{$datasiswa->kelas}}">
                                <option disabled selected>Pilih Kelas
                                </option>
                                <option value="X">X
                                </option>
                                <option value="XI">XI</option>
                                <option value="XII">XII</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="nis" class="col-md-4 col-form-label text-md-right">{{ __('Jurusan') }}</label>

                        <div class="col-md-7">
                            <select name="jurusan" id="" class="form-control" value="{{$datasiswa->jurusanSiswa->nama_jurusan}}">
                                <option disabled>Pilih Jurusan
                                </option>
                                <option value="1">Rekayasa Perangkat Lunak
                                </option>
                                <option value="2">Multimedia</option>
                                <option value="3">Teknik Komputer dan
                                    Jaringan</option>
                                <option value="4">Sistem Informatika
                                    Jaringan dan Aplikasi</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nis" class="col-md-4 col-form-label text-md-right">{{ __('Alamat') }}</label>

                        <div class="col-md-7">
                        <textarea name="alamat" id="" class="form-control" cols="10" rows="4">{{$datasiswa->alamat}}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nis"
                            class="col-md-4 col-form-label text-md-right">{{ __('Nomor Handphone') }}</label>

                        <div class="col-md-7">
                        <input type="text" name="no_hp" id="" class="form-control" value="{{$datasiswa->no_hp}}">
                            <input type="hidden" name="verify" id="" value="1">

                        </div>
                    </div>
                    <div class="form-group row">
                            <div class="col-md-4">
                                <span></span>
                            </div>
    
                            <div class="col-md-7">
                                    <input type="submit" class="btn btn-primary" form="formSiswa" value="Update Data">
                                    <a href="{{URL('/datasiswa')}}" style="color: #3498db; padding-left:1em;" >Back to List Data</a>
                            </div>
                        </div>
                    
                </form>



            </div>
        </div>
    </div>
</div>
@endsection
