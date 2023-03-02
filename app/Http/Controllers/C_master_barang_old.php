<?php

namespace App\Http\Controllers;

use App\M_master;
use App\M_barang_masuk;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class C_master_barang extends Controller
{
    public function index()
    {
        // ambil data master dan juga barang
        $data_master = DB::table('master_barang')
                        ->select('master_barang.*', 'barang.nama_barang as namabarang', 'barang.satuan as satuanbarang', 'barang.spesifikasi as spesifikasibarang')
                        ->join('barang', 'barang.id','=','master_barang.id_barang')
                        ->where(array('barang.safe_delete' => '0','master_barang.safe_delete' => '0'))->get();

        // ambil data barang masuk sesuai faktur yang diinputkan
        $data_option = DB::table('barang_masuk')
                        ->select('barang_masuk.id as id_barang_masuk', 'barang_masuk.volume_faktur as faktur','barang.nama_barang as namabarang','barang.spesifikasi as spesifikasibarang')
                        ->join('barang', 'barang.id','=','barang_masuk.id_barang')
                        ->where(array('barang.safe_delete' => '0', 'barang_masuk.status' => '0'))->get();

        return view('master_barang', ['data'=>$data_master, 'option'=>$data_option]);
    }

    public function tambah(Request $request)
    {
        // ambil data faktur dan id barang pada table barang masuk dulu
        $barang_masuk = M_barang_masuk::where('id', $request->id_barang_masuk)->first();
        $faktur = $barang_masuk->volume_faktur;
        $saldo = $barang_masuk->jumlah_barang;
        $id_barang = $barang_masuk->id_barang;

        // cek id barang dan rak jika sama maka update stok, jika beda maka tambah baru
        $cek_data = M_master::where(array('id_barang'=>$id_barang,'no_rak'=>$request->no_rak))->first();
        if ($cek_data) {
            // jika ada maka update saldo
            M_master::where('id',$cek_data->id)
            ->update([
               'saldo_akhir' => $saldo+$cek_data->saldo_akhir,
            ]);
            // insert safe delete untuk menyimpan faktur saja
            $post = new M_master();
            $post->faktur = $faktur;
            $post->safe_delete = 1;
            $post->save();
             M_barang_masuk::where('id',$request->id_barang_masuk)->update(['status' => '1',]);
            // status 1 = barang sudah dimasukkan ke master / faktur sudah digunakan

        } else {
            // jika tidak ada
            $post = new M_master();
            $post->saldo_akhir = $saldo;
            $post->no_rak = $request->no_rak;
            $post->faktur = $faktur;
            $post->keterangan = $request->keterangan;
            $post->id_barang = $id_barang;
            $post->safe_delete = 0;
            $post->save();
            // edit status barang masuk menjadi 1
            // $request->id_barang_masuk
             M_barang_masuk::where('id',$request->id_barang_masuk)->update(['status' => '1',]);
            // status 1 = barang sudah dimasukkan ke master / faktur sudah digunakan
        }
        // dd($request);
        return redirect('/master_barang');
    }

    public function edit(Request $request){
        // cek jika update rak maka saldo menjadi update
        $cek_data = M_master::where(array('id_barang'=>$request->id_barang,'no_rak'=>$request->no_rak))->first();
            if ($cek_data) {
            // cek id master apakah sama dengan yang sedang di request, jika sama maka tidak jadi update saldo 
                if ($cek_data->id != $request->id) {
                    // jika update rak maka update saldo dan ganti safe delete menjadi 1
                    M_master::where('id',$cek_data->id)
                    ->update([
                       'saldo_akhir' => $request->saldo+$cek_data->saldo_akhir,
                    ]);
                    // update safe delete menjadi 1
                    M_master::where('id',$request->id)
                    ->update([
                       'safe_delete' => '1',
                    ]);
                } else {
                    // jika tidak update rak maka update biasa
                    M_master::where('id',$request->id)
                    ->update([
                       'saldo_akhir' => $request->saldo,
                       'no_rak' => $request->no_rak,
                       'keterangan' => $request->keterangan,
                    ]);
                }
                
            } else {
                // jika tidak update rak maka update biasa
                M_master::where('id',$request->id)
                ->update([
                   'saldo_akhir' => $request->saldo,
                   'no_rak' => $request->no_rak,
                   'keterangan' => $request->keterangan,
                ]);
            }
        
        return redirect()->back();
    }

    public function delete($id)
    {
        M_master::where('id',$id)
        ->update([
           'safe_delete' => '1',
        ]);
        return redirect()->back();
    }
}
