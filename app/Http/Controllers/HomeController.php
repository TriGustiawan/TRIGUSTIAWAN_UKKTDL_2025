<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tudu;
use RealRashid\SweetAlert\Facades\Alert;


class HomeController extends Controller
{


    public function simpan(request $request){

        $request->validate([
            'kegiatan' => 'required',
            'hari' => 'required',
            'tanggal' => 'required|date',
            'prioritas' => 'required',
            'status' => 'required'
        ]);
        $simpan = new Tudu();
        $simpan->kegiatan = $request->kegiatan;
        $simpan->hari = $request->hari;
        $simpan->tanggal = $request->tanggal;
        $simpan->prioritas = $request->prioritas;
        $simpan->status = $request->status;
        $simpan->save();
        Alert::success('NOTIFICATION', 'BERHASIL BUAT BANG');
        return redirect()->back();
    }

    public function ubahstat($idtudu, $status){
        $ubah = Tudu::findOrFail($idtudu);
        $ubah->status = $status;
        $ubah->save();
        Alert::success('NOTIFICATION', 'SUKSES UBAH BANG');
        return redirect()->back();
    }
    public function edit(request $request , $id){

        $validated = $request->validate([

            'kegiatan' => 'required',
            'hari' => 'required',
            'tanggal' => 'required|date',
            'prioritas' => 'required',

        ]);
        $simpan =  Tudu::findOrFail($id);
        $simpan->kegiatan = $request->kegiatan;
        $simpan->hari = $request->hari;
        $simpan->tanggal = $request->tanggal;
        $simpan->prioritas = $request->prioritas;
        $simpan->save();
        Alert::success('NOTIFICATION', 'BERHASIL EDIT BANG');
        return redirect()->back();
    }

    public function hapus($id){
        $hapus = Tudu::findOrFail($id)->delete();
        Alert::success('NOTIFICATION', 'BERHASIL DIHAPUS BANG');
        return redirect()->back();

    }


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
        return view('home')->with([
            'datas' => Tudu::all()
        ]);
    }
}
