<?php

namespace App\Http\Controllers;

use App\Model\Guru\Guru;
use App\Model\Guru\Nilai;
use Illuminate\Http\Request;
use App\Model\Siswa\Siswa;
use App\Model\Siswa\Mapel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
// use Alert;
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
        $getStatusNilai = Nilai::all();
        $getGuruEmail = Auth::user()->email;
        $dataguru = Guru::where('email', 'like', "%" . $getGuruEmail . "%")->first();

        return view('guru/guruDataSiswa', \compact('getSiswa', 'getStatusNilai', 'dataguru'));
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

    public function guruInsertNilai(Request $request)
    {
        $nilaiuh = $request->uh;
        $nilaiuts = $request->uts;
        $nilaiuas = $request->uas;

        $totalnilai = ($nilaiuh + $nilaiuts + $nilaiuas) / 3;

        $this->validate($request, [
            'nis' => 'required',
            'nip' => 'required',
            'mapel' => 'required',
            'uh' => 'required',
            'uts' => 'required',
            'uas' => 'required'
        ]);

        Nilai::create([
            'nis_siswa' => $request->nis,
            'nip_guru' => $request->nip,
            'id_mapel' => $request->mapel,
            'uh' => $request->uh,
            'uts' => $request->uts,
            'uas' => $request->uas,
            'akhir' => $totalnilai,
            'check_nilai' => 1
        ]);

        // $getDataSiswa = Siswa::find($id);
        // $getDataSiswa->status_nilai = 1;
        // $getDataSiswa->save();

        return redirect('guru/datasiswa');
    }

    public function guruUpdateNilai($id)
    {
        // $datasiswa = Siswa::find($id);
        // $getGuruEmail = Auth::user()->email;
        // $dataguru = Guru::where('email', 'like', "%" . $getGuruEmail . "%")->first();
        // $datanilai = Nilai::where('nis', 'like' . $datasiswa->nis);
        // $datanilaiguru = Guru::where('nip' . $dataguru->nip);
        // return view('guru/nilai/updatenilai', \compact('datasiswa', 'dataguru', 'datanilai', 'datanilaiguru'));

        $datasiswa = Siswa::find($id);
        $getGuruEmail = Auth::user()->email;
        $dataguru = Guru::where('email', 'like', "%" . $getGuruEmail . "%")->first();
        return view('guru/nilai/updatenilai', \compact('datasiswa', 'dataguru'));
    }


    // Siswa

    public function siswaHome()
    {
        $getSiswaEmail = Auth::user()->email;
        $datanilai = Nilai::all();
        $datasiswa = Siswa::where('email', 'like', "%" . $getSiswaEmail . "%")->get();
        return view('../siswa/siswaHome', \compact('datasiswa', 'datanilai'));
    }

    public function tampilNilaiSiswa($nis)
    {
        $getSiswaEmail = Auth::user()->email;
        $datasiswa = Siswa::where('email', 'like', "%" . $getSiswaEmail . "%")->get();
        // $getnis = Siswa::where('nis', 'like', "%" . $getSiswaEmail . "%")->first();
        $datanilai = Nilai::all();
        $getnis = Siswa::all();
        $datamapel = Mapel::all();
        return view('../siswa/nilaisiswa', compact('datasiswa', 'datamapel', 'datanilai'));
    }
}
