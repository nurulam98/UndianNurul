<?php

namespace App\Http\Controllers;

use App\Imports\PesertaImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;

class ZeeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function hadiahView()
    {
        return view('home');
    }

    public function pesertaView()
    {
        return view('UploadPeserta');
    }
    public function pesertaPost(Request $request)
    {
        $file = $request->file;

        // membuat nama file unik
        $nama_file = bin2hex(random_bytes(5)).$file->getClientOriginalName();

        // upload ke folder file_siswa di dalam folder public
        $file->move('file_coupon',$nama_file);

        // import data
        Excel::import(new PesertaImport, public_path('/file_coupon/'.$nama_file));

        // notifikasi dengan session
        Session::flash('sukses','Data Peserta Berhasil Diimport!');

        // alihkan halaman kembali
        return redirect(route('importPeserta'));

    }
    public function pemenangView()
    {
        return view('home');
    }

}
