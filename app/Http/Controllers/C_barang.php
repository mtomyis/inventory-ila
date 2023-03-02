<?php

namespace App\Http\Controllers;

use App\M_barang;
use Illuminate\Http\Request;

class C_barang extends Controller
{
    public function index()
    {
        // status 0 = aktif
        // status 1 = delete
        $data_barang = M_barang::where('safe_delete', '=', '0')->get();
        return view('barang', ['data'=>$data_barang]);
    }

    public function tambah(Request $request)
    {
        // dd($request);
        $post = new M_barang();
        $post->nama_barang = $request->nama;
        $post->satuan = $request->satuan;
        $post->spesifikasi = $request->spesifikasi;
        $post->safe_delete = 0;

        // status 0 = barang aktif
        // status 1 = barang terhapus

        $post->save();
        return redirect('/barang');
    }

    public function edit(Request $request){

        // dd($request);
        M_barang::where('id',$request->id)
        ->update([
           'nama_barang' => $request->nama,
           'satuan' => $request->satuan,
           'spesifikasi' => $request->spesifikasi,
         ]);
        return redirect()->back();
    }

    public function delete($id)
    {
        M_barang::where('id',$id)
        ->update([
           'safe_delete' => '1',
         ]);
        return redirect()->back();
    }
}
