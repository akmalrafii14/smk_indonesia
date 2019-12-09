@extends('layouts.app')
@extends('layouts.sidebar')
@section('content')

<div id="content">
    <div class="container py-4">
        <div class="card">
            <div class="card-body">
                    <h3>Tambah Data Siswa</h3>
                    <p>Masukkan Data dengan Benar</p>

                <form method="POST" action="{{URL('admin/inputsiswa')}}" id="formSiswa">
                    @csrf
                    <div class="form-group row">
                        <label for="email"
                            class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                        <div class="col-md-7">
                            <input id="email" type="email" class="form-control" name="email" required>


                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nis"
                            class="col-md-4 col-form-label text-md-right">{{ __('Nomor Induk Siswa') }}</label>

                        <div class="col-md-7">
                            <input id="text" type="text" class="form-control" name="nis" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nama" class="col-md-4 col-form-label text-md-right">{{ __('Nama Lengkap') }}</label>

                        <div class="col-md-7">
                            <input id="text" type="text" class="form-control" name="name" required autocomplete="name">


                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nis" class="col-md-4 col-form-label text-md-right">{{ __('Jenis Kelamin') }}</label>

                        <div class="col-md-7">
                            <select name="jeniskelamin" id="" class="form-control">
                                <option disabled selected>Pilih Jenis
                                    Kelamin</option>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nis" class="col-md-4 col-form-label text-md-right">{{ __('Jurusan') }}</label>

                        <div class="col-md-7">
                            <select name="jurusan" id="" class="form-control">
                                <option disabled selected>Pilih Jurusan
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
                            <textarea name="alamat" id="" class="form-control" cols="10" rows="4"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nis"
                            class="col-md-4 col-form-label text-md-right">{{ __('Nomor Handphone') }}</label>

                        <div class="col-md-7">
                            <input type="text" name="no_hp" id="" class="form-control">
                            <input type="hidden" name="verify" id="" value="1">

                        </div>
                    </div>
                    <div class="form-group row">
                            <div class="col-md-4">
                                <span></span>
                            </div>
    
                            <div class="col-md-7">
                                    <input type="submit" class="btn btn-primary" form="formSiswa" value="Input Data">
                            </div>
                        </div>
                    
                </form>



            </div>
        </div>
    </div>
</div>
@endsection
