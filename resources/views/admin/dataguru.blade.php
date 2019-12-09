@extends('layouts.app')
@extends('layouts.sidebar')
@section('content')


<div id="content">
    <div class="container py-4">
        <div class="card">
            <div class="card-body">
                <h3>Hello, {{ Auth::user()->name }}</h3>
                <p>Data Guru</p>
                <div class="row search-bar pb-3 pl-3">
                    <form class="form-inline my-2 my-lg-0" action="{{URL('dataguru/cari')}}" method="GET">
                        <input class="form-control mr-sm-2" type="search" placeholder="Cari Data Guru"
                            aria-label="Search" name="search" required>
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Cari</button>
                    </form>
                        <div class="tambahdata pl-2">
                            <a href="{{URL('admin/viewinputguru')}}" class="btn btn-primary my-2 my-sm-0">Tambah Data Guru</a> 
                        </div>
                </div>                
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">NIP</th>
                            <th scope="col">Nama Guru</th>
                            <th scope="col">Program Keahlian</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php 
                                $no = 1;
                                ?>
                        @foreach ($dataguru as $data)

                        <tr>
                            <th>{{$no++}}</th>
                            <td>{{$data->nip}}</td>
                            <td>{{$data->nama}}</td>
                            <td>{{ $data->ProdiGuru->nama }}</td>
                            <td>

                                <div class="modal-guru">
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#exampleModalDataGuru{{$data->nip}}">
                                        See Details
                                    </button>
                                    &nbsp;
                                    <a href="admin/deleteguru/{{$data->id}}"
                                        onclick="return confirm('You are going to delete {{$data->nama}} from the record. Are you sure?')"><button
                                            type="submit" class="btn btn-danger">Delete Data</button></a>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModalDataGuru{{$data->nip}}" tabindex="-1"
                                        role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Data Guru : {{$data->nama}}</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">

                                                    <div class="form-group row">
                                                        <label for="nama"
                                                            class="col-md-5 align-right">{{ __('Nomor Induk Pegawai') }}</label>
                                                        <label for="" class="col-md-1">:</label>

                                                        <div class="col-md-6">
                                                            {{$data->nip}}
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="nama"
                                                            class="col-md-5 align-right">{{ __('Nama Guru') }}</label>
                                                        <label for="" class="col-md-1">:</label>

                                                        <div class="col-md-6">
                                                            {{$data->nama}}
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="nama"
                                                            class="col-md-5 align-right">{{ __('Program Studi') }}</label>
                                                        <label for="" class="col-md-1">:</label>

                                                        <div class="col-md-6">
                                                            {{ $data->ProdiGuru->nama }}
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="nama"
                                                            class="col-md-5 align-right">{{ __('Jenis Kelamin') }}</label>
                                                        <label for="" class="col-md-1">:</label>

                                                        <div class="col-md-6">
                                                            {{$data->jenis_kelamin}}
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="nama"
                                                            class="col-md-5 align-right">{{ __('Alamat') }}</label>
                                                        <label for="" class="col-md-1">:</label>

                                                        <div class="col-md-6">
                                                            {{$data->alamat}}
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="nama"
                                                            class="col-md-5 align-right">{{ __('Nomor Handpone') }}</label>
                                                        <label for="" class="col-md-1">:</label>

                                                        <div class="col-md-6">
                                                            {{$data->no_hp}}
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="nama"
                                                            class="col-md-5 align-right">{{ __('E-mail') }}</label>
                                                        <label for="" class="col-md-1">:</label>

                                                        <div class="col-md-6">
                                                            {{$data->email}}
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Close</button>
                                                    <a href="admin/updateguru/{{$data->id}}"><button type="submit"
                                                            class="btn btn-primary">Edit Data</button></a>


                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>




                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>


            </div>
        </div>
    </div>
</div>
@endsection
