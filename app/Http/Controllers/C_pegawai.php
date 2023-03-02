<?php

namespace App\Http\Controllers;

use App\M_pegawai;
use Illuminate\Http\Request;

class C_pegawai extends Controller
{
    public function index()
    {
        $data_pegawai = M_pegawai::where('safe_delete', '=', '0')->get();
        return view('menu/v_pegawai', ['data'=>$data_pegawai]);
    }

    public function tambah(Request $request)
    {
        // dd($request);
        $post = new M_pegawai();
        $post->nama = $request->nama;
        $post->jabatan = $request->jabatan;
        // $post->devisi = $request->devisi;
        $post->safe_delete = 0;

        // status 0 = pegawai aktif
        // status 1 = pegawai terhapus

        $post->save();
        return redirect('pegawai');
    }

    public function edit(Request $request){

        // dd($request);
        M_pegawai::where('id',$request->id)
        ->update([
           'nama' => $request->nama,
           'jabatan' => $request->jabatan,
        //    'devisi' => $request->devisi,
         ]);
        return redirect()->back();
    }

    public function delete($id)
    {
        M_pegawai::where('id',$id)
        ->update([
           'safe_delete' => '1',
         ]);
        return redirect()->back();
    }
}
