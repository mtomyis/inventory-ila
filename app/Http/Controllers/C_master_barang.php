<?php

namespace App\Http\Controllers;

use App\M_master_barang;
use Illuminate\Http\Request;

class C_master_barang extends Controller
{
    public function index()
    {
        $data_master_barang = M_master_barang::where('safe_delete', '=', '0')->get();
        return view('menu/v_master_barang', ['data'=>$data_master_barang]);
    }

    public function tambah(Request $request)
    {
        // cek kode barang apakah sama
        $cek = M_master_barang::where('kode_barang', $request->kode_barang)->first();
        if($cek){
            // kode_barang sama
        }else{

            // dd($request);
            $post = new M_master_barang();
            $post->kode_barang = $request->kode_barang;
            $post->nama = $request->nama;
            $post->satuan = $request->satuan;
            $post->ukuran = $request->ukuran;
            $post->rak = $request->rak;
            $post->tanggal = $request->tanggal;
            $post->jumlah = $request->jumlah;
            $post->safe_delete = 0;
            $post->save();

            // status 0 = master_barang aktif
            // status 1 = master_barang terhapus
        }

        return redirect('master_barang');
    }

    public function edit(Request $request){

        // dd($request);
        // cek kode barang apakah sama
        $cek = M_master_barang::where('kode_barang', $request->kode_barang)->first();
        if($cek){
            // kode_barang sama
            if ($cek->id == $request->id) {
                M_master_barang::where('id',$request->id)
                ->update([
                   'jumlah' => $request->jumlah,
                   'kode_barang' => $request->kode_barang,
                   'nama' => $request->nama,
                   'satuan' => $request->satuan,
                   'ukuran' => $request->ukuran,
                   'rak' => $request->rak,
                   'tanggal' => $request->tanggal,
                   'jumlah' => $request->jumlah,
                 ]);
            }
        }
        
        return redirect()->back();
    }

    public function delete($id)
    {
        M_master_barang::where('id',$id)
        ->update([
           'safe_delete' => '1',
         ]);
        return redirect()->back();
    }
}
