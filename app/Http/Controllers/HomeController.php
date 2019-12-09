<?php

namespace App\Http\Controllers;

use App\Model\Guru\Guru;
use Illuminate\Http\Request;
use App\Model\Siswa\Siswa;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Alert;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    // Admin

    public function adminHome()
    {
        // Alert::message('Robots are working!');
        $getSiswa = Siswa::all();
        $getGuru = Guru::all();

        return view('admin/adminHome', \compact('getSiswa', 'getGuru'));
    }

    public function adminSiswa()
    {
        $siswa = Siswa::all();
        return view('admin/datasiswa', ['datasiswa' => $siswa]);
    }

    public function viewInputSiswa()
    {
        return view('admin/siswa/inputsiswa');
    }

    public function adminInputSiswa(Request $request)
    {
        $this->validate($request, [
            'nis' => 'required',
            'name' => 'required',
            'jeniskelamin' => 'required',
            'jurusan' => 'required',
            'kelas' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
            'verify' => 'required'
        ]);

        Siswa::create([
            'nis' => $request->nis,
            'nama_siswa' => $request->name,
            'email' => $request->email,
            'jenis_kelamin' => $request->jeniskelamin,
            'kelas' => $request->kelas,
            'jurusan' => $request->jurusan,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
        ]);

        User::create([
            'name' => $request->name,
            'password' => Hash::make($request->password),
            'email' => $request->email,
            'role' => "3",
        ]);

        return redirect('datasiswa');


        // $get = Siswa::select('email')->where('verified', 1)->get();
        // print_r($get);
        // return redirect('../siswaHome');
        // // dd(request()->all());
    }

    public function adminUpdateSiswaView($id)
    {
        $data = Siswa::find($id);
        return view('admin/siswa/editsiswa', ['datasiswa' => $data]);
    }

    public function adminUpdateDataSiswa($id, Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'nis' => 'required',
            'name' => 'required',
            'jeniskelamin' => 'required',
            'jurusan' => 'required',
            'kelas' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required'
        ]);

        $datasiswa = Siswa::find($id);
        $datasiswa->email = $request->email;
        $datasiswa->nis = $request->nis;
        $datasiswa->kelas = $request->kelas;
        $datasiswa->nama_siswa = $request->name;
        $datasiswa->jenis_kelamin = $request->jeniskelamin;
        $datasiswa->jurusan = $request->jurusan;
        $datasiswa->alamat = $request->alamat;
        $datasiswa->no_hp = $request->no_hp;
        $datasiswa->save();

        return redirect('datasiswa');
    }

    public function adminDeleteSiswa($id)
    {
        $datasiswa = Siswa::find($id);
        $datasiswa->delete();
        return \redirect('datasiswa');
    }

    public function adminCariDataSiswa(Request $request)
    {
        $search = $request->search;

        $datasiswa = Siswa::where('nama_siswa', 'like', "%" . $search . "%")->orWhere('nis', 'like', "%" . $search . "%")->get();

        return view('admin/datasiswa', ['datasiswa' => $datasiswa]);

        // dd(request()->all());
    }

    // Admin for Guru

    public function adminGuru()
    {
        $guru = Guru::all();
        return view('admin/dataguru', ['dataguru' => $guru]);
    }

    public function viewInputGuru()
    {
        return view('admin/guru/inputguru');
    }

    public function adminInputGuru(Request $request)
    {
        $this->validate($request, [
            'nip' => 'required',
            'nama' => 'required',
            'jeniskelamin' => 'required',
            'prodi' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required'
        ]);

        Guru::create([
            'nip' => $request->nip,
            'nama' => $request->nama,
            'password' => Hash::make($request->password),
            'email' => $request->email,
            'jenis_kelamin' => $request->jeniskelamin,
            'prodi' => $request->prodi,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp
        ]);

        User::create([
            'name' => $request->nama,
            'password' => Hash::make($request->password),
            'email' => $request->email,
            'role' => "2",
        ]);

        return redirect('dataguru');


        // $get = Siswa::select('email')->where('verified', 1)->get();
        // print_r($get);
        // return redirect('../siswaHome');
        // dd(request()->all());
    }

    public function adminUpdateGuruView($id)
    {
        $data = Guru::find($id);
        return view('admin/guru/editguru', ['dataguru' => $data]);
    }

    public function adminUpdateDataGuru($id, Request $request)
    {
        $this->validate($request, [
            'nip' => 'required',
            // 'email' => 'required',
            'nama' => 'required',
            'jeniskelamin' => 'required',
            'prodi' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required'
        ]);

        $dataguru = Guru::find($id);
        // $dataguru->email = $request->email;
        $dataguru->nip = $request->nip;
        $dataguru->nama = $request->nama;
        $dataguru->jenis_kelamin = $request->jeniskelamin;
        $dataguru->prodi = $request->prodi;
        $dataguru->alamat = $request->alamat;
        $dataguru->no_hp = $request->no_hp;
        $dataguru->save();

        return redirect('dataguru');

        // $get = Siswa::select('email')->where('verified', 1)->get();
        // print_r($get);
        // return redirect('../siswaHome');
        // dd(request()->all());
    }

    public function adminDeleteGuru($id)
    {
        $dataguru = Guru::find($id);
        $dataguru->delete();
        return \redirect('dataguru');
    }

    public function adminCariDataGuru(Request $request)
    {
        $search = $request->search;

        $dataguru = Guru::where('nama', 'like', "%" . $search . "%")->orWhere('nip', 'like', "%" . $search . "%")->get();

        return view('admin/dataguru', ['dataguru' => $dataguru]);

        // dd(request()->all());
    }


    // Guru

    public function guruDashboard()
    {
        $getSiswa = Siswa::all();

        return view('guru/guruHome', \compact('getSiswa'));
    }

    public function guruViewSiswa()
    {
        $getSiswa = Siswa::all();

        return view('guru/guruDataSiswa', \compact('getSiswa'));
    }

    public function guruCariDataSiswa(Request $request)
    {
        $search = $request->search;

        $datasiswa = Siswa::where('nama_siswa', 'like', "%" . $search . "%")->orWhere('nis', 'like', "%" . $search . "%")->get();

        return view('guru/guruDataSiswa', ['datasiswa' => $datasiswa]);

        // dd(request()->all());
    }

    public function guruInputNilai($id)
    {
        $datasiswa = Siswa::find($id);
        $getGuruEmail = Auth::user()->email;
        $dataguru = Guru::where('email', 'like', "%" . $getGuruEmail . "%")->first();
        return view('guru/nilai/inputnilai', \compact('datasiswa', 'dataguru'));
    }


    // Siswa

    public function siswaHome()
    {

        return view('../siswa/siswaHome');
    }
}
