<?php

namespace App\Http\Controllers;

use App\M_barang_masuk;
use App\M_master;
use App\M_barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class C_barang_masuk extends Controller
{
    public function index()
    {
        $data_barang = DB::table('barang_masuk')
                        ->select('barang_masuk.*', 'barang.nama_barang as namabarang', 'barang.satuan as satuanbarang','barang.spesifikasi as spesifikasibarang')
                        ->join('barang', 'barang.id','=','barang_masuk.id_barang')
                        ->where(array('barang.safe_delete' => '0'))->get();

        $data_option = M_barang::where('safe_delete', '=', '0')->get();
        return view('barang_masuk', ['data'=>$data_barang, 'option'=>$data_option, 'error'=>'0']);
    }

    public function tambah(Request $request)
    {
        // error_reporting(0);
        // dd($request);
        // cek faktur pernah dipakai atau tidak
        $barang = M_master::where('faktur', $request->volume)->first();
        if($barang){
            // jika faktur ada
            // $error = 'Terdapat faktur yang sama pada data master';
            $error = '1';

        }else{
            $post = new M_barang_masuk();
            $post->id_barang = $request->id_barang;
            $post->satuan = $request->satuan;
            $post->volume_faktur = $request->volume;
            $post->jumlah_barang = $request->jumlah;
            $post->selisih_barang = $request->selisih;
            $post->tanggal = $request->tanggal;
            $post->status = 0;
            $post->save();
            // $error = 'Data berhasil disimpan';
            $error = '2';
        }

        $data_barang = DB::table('barang_masuk')
                        ->select('barang_masuk.*', 'barang.nama_barang as namabarang', 'barang.satuan as satuanbarang','barang.spesifikasi as spesifikasibarang')
                        ->join('barang', 'barang.id','=','barang_masuk.id_barang')
                        ->where(array('barang.safe_delete' => '0'))->get();

        $data_option = M_barang::where('safe_delete', '=', '0')->get();
        return view('barang_masuk', ['data'=>$data_barang, 'option'=>$data_option, 'error'=> $error]);
    }

    public function tambah_barang_baru(Request $request)
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
        return redirect('/barang_masuk');
    }

    public function edit(Request $request){
        error_reporting(0);
        // cek faktur pernah dipakai atau tidak
        $barang = M_master::where('faktur', $request->volume)->first();
        // var_dump($barang);
        if($barang->id != null){
            // jika faktur ada
            // $error = 'Terdapat faktur yang sama pada data master';
            $error = '1';

        }else{
            M_barang_masuk::where('id',$request->id)
            ->update([
               'id_barang' => $request->id_barang,
               'satuan' => $request->satuan,
               'volume_faktur' => $request->volume,
               'jumlah_barang' => $request->jumlah,
               'selisih_barang' => $request->selisih,
               'tanggal' => $request->tanggal,
             ]);
            // $error = 'Data berhasil diedit';
            $error = '2';
        }
        $data_barang = DB::table('barang_masuk')
                        ->select('barang_masuk.*', 'barang.nama_barang as namabarang', 'barang.satuan as satuanbarang','barang.spesifikasi as spesifikasibarang')
                        ->join('barang', 'barang.id','=','barang_masuk.id_barang')
                        ->where(array('barang.safe_delete' => '0'))->get();

        $data_option = M_barang::where('safe_delete', '=', '0')->get();
        return view('barang_masuk', ['data'=>$data_barang, 'option'=>$data_option, 'error'=> $error]);
    }

    public function delete($id)
    {
        M_barang_masuk::where('id',$id)->delete();
        return redirect()->back();
    }

    public function tambah_barang(Request $request)
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
        return redirect('/barang_masuk');
    }

    public function edit_barang(Request $request){

        // dd($request);
        M_barang::where('id',$request->id)
        ->update([
           'nama_barang' => $request->nama,
           'satuan' => $request->satuan,
           'spesifikasi' => $request->spesifikasi,
         ]);
        return redirect()->back();
    }

    public function delete_barang($id)
    {
        M_barang::where('id',$id)
        ->update([
           'safe_delete' => '1',
         ]);
        return redirect()->back();
    }

}
