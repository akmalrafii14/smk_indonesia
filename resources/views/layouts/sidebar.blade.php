@section('sidebar')
<nav id="sidebar">
    <div class="sidebar-header">
        <h3>SMK Indonesia</h3>
        <label for="">Created by Akmal Rafi</label>
        <label for="">XII RPL 2 - 2019</label>
        <label for="">SMKN 1 Cibinong</label>
    </div>

    <ul class="list-unstyled components">
        <strong>
            <p>Hello, {{ Auth::user()->name }}</p>
        </strong>
        <li>
            @if (Auth::user()->role == 1)
            <a href="/admin/home">Home</a>
            @elseif (Auth::user()->role == 2)
            <a href="/guru/home">Home</a>
            @endif
        </li>

        <li>
            <a href="#pageSubmenu" data-toggle="collapse" class="dropdown-toggle" aria-expanded="false">Data Sekolah</a>
            <ul class="collapse list-unstyled " id="pageSubmenu">
                @if (Auth::user()->role == 1)
                <li>
                    <a href="#pageSubmenu2" data-toggle="collapse" class="dropdown-toggle" aria-expanded="false">Tambah
                        Data</a>
                    <div class="second-dropdown">
                        <ul class="collapse list-unstyled " id="pageSubmenu2">
                            <li>
                                <a href="{{URL('admin/viewinputguru')}}">Tambah Data
                                    Guru</a>
                            </li>
                            <li>
                                <a href="{{URL('admin/viewinputsiswa')}}">Tambah Data Siswa</a>
                            </li>

                        </ul>
                    </div>

                </li>
                <li>
                    <a href="{{URL('dataguru')}}">Data Guru</a>
                </li>
                @endif
                <li>
                    <a href="{{URL('datasiswa')}}">Data Siswa</a>
                </li>

            </ul>
        </li>
        <li>
            <a href="">Other Link</a>
        </li>
        <li>
            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                                 document.getElementById('logout-form').submit();" x>
                {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </li>
    </ul>
</nav>
@endsection
