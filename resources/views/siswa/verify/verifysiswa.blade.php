@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 pt-4">
            <div class="card">
                <div class="card-header">Verify Your Account</div>

                @if ($errors->any())    
                <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
                </ul>
            @endif

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <form action="{{URL('siswa/postVerify')}}" method="POST">
                        @csrf
                        <div class="form-group row">
                            <label for="email"
                                class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" required autocomplete="email" value="{{Auth::user()->email}}" disabled>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nis"
                                class="col-md-4 col-form-label text-md-right">{{ __('Nomor Induk Siswa') }}</label>

                            <div class="col-md-6">
                                <input id="text" type="text" class="form-control" name="nis" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nama"
                                class="col-md-4 col-form-label text-md-right">{{ __('Nama Lengkap') }}</label>

                            <div class="col-md-6">
                                <input id="text" type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" required autocomplete="name" value="{{Auth::user()->name}}">

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nis"
                                class="col-md-4 col-form-label text-md-right">{{ __('Jenis Kelamin') }}</label>

                            <div class="col-md-6">
                                <select name="jeniskelamin" id="" class="form-control">
                                    <option disabled selected>Pilih Jenis Kelamin</option>
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nis" class="col-md-4 col-form-label text-md-right">{{ __('Jurusan') }}</label>

                            <div class="col-md-6">
                                <select name="jurusan" id="" class="form-control">
                                    <option disabled selected>Pilih Jurusan</option>
                                    <option value="1">Rekayasa Perangkat Lunak</option>
                                    <option value="2">Multimedia</option>
                                    <option value="3">Teknik Komputer dan Jaringan</option>
                                    <option value="4">Sistem Informatika Jaringan dan Aplikasi</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nis" class="col-md-4 col-form-label text-md-right">{{ __('Alamat') }}</label>

                            <div class="col-md-6">
                                <textarea name="alamat" id="" class="form-control" cols="10" rows="4"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nis"
                                class="col-md-4 col-form-label text-md-right">{{ __('Nomor Handphone') }}</label>

                            <div class="col-md-6">
                                <input type="text" name="no_hp" id="" class="form-control">
                                <input type="hidden" name="verify" id="" value="1">

                            </div>
                        </div>
                        <div class="form-group row pt-3">
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-primary" style="width: 100%;">Input Data</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
</div>
</div>
</div>
</div>
@endsection
