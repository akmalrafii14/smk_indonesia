@extends('layouts.app')
@section('content')


<div id="content">
    <div class="container py-4">
        <div class="card">
            <div class="card-body">
                <h3>Hello, {{ Auth::user()->name }}</h3>
                <p>What do you wanted to do today?</p>
                @foreach ($datasiswa as $data)
            <a href="/siswa/nilai/{{$data->nis}}">Lihat nilai</a>
                @endforeach
            

            </div>
        </div>
    </div>
</div>
@endsection
