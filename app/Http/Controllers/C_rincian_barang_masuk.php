<?php

namespace App\Http\Controllers;

use App\M_bon_barang;
use App\M_rincian_bon_barang;
use App\M_rincian_barang_masuk;
use App\M_barang_masuk;
use App\M_master_barang;
use App\M_pegawai;
use App\M_devisi;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class C_rincian_barang_masuk extends Controller
{
    public function index($id_barang_masuk)
    {
        // ambil data bon barang bserta devisi
        $data_rincian_barang_masuk = DB::table('t_rincian_barang_masuk')
                        ->select('t_rincian_barang_masuk.*', 't_master_barang.kode_barang as kode_barang', 't_master_barang.nama as nama_barang', 't_master_barang.satuan as satuan_barang')
                        ->join('t_master_barang', 't_master_barang.id','=','t_rincian_barang_masuk.id_barang')
                        ->where('t_rincian_barang_masuk.id_barang_masuk', $id_barang_masuk)->get();

        $data_barang_masuk = DB::table('t_barang_masuk')
                        ->select('t_barang_masuk.*', 'devisi.nama as nama_devisi')
                        ->join('devisi', 'devisi.id','=','t_barang_masuk.id_bagian')
                        ->where('t_barang_masuk.id', $id_barang_masuk)->first();

        $diterima_dari = DB::table('t_barang_masuk')
                        ->select('t_pegawai.nama as diterima_dari')
                        ->join('t_pegawai', 't_pegawai.id','=','t_barang_masuk.diterima_dari')
                        ->where('t_barang_masuk.id', $id_barang_masuk)->first();

        $diperiksa_oleh = DB::table('t_barang_masuk')
                        ->select('t_pegawai.nama as diperiksa_oleh')
                        ->join('t_pegawai', 't_pegawai.id','=','t_barang_masuk.diperiksa_oleh')
                        ->where('t_barang_masuk.id', $id_barang_masuk)->first();
        
        $diterima_oleh = DB::table('t_barang_masuk')
                        ->select('t_pegawai.nama as diterima_oleh')
                        ->join('t_pegawai', 't_pegawai.id','=','t_barang_masuk.diterima_oleh')
                        ->where('t_barang_masuk.id', $id_barang_masuk)->first();

        $diketahui_oleh = DB::table('t_barang_masuk')
                        ->select('t_pegawai.nama as diketahui_oleh')
                        ->join('t_pegawai', 't_pegawai.id','=','t_barang_masuk.diketahui_oleh')
                        ->where('t_barang_masuk.id', $id_barang_masuk)->first();

        $dibukukan_oleh = DB::table('t_barang_masuk')
                        ->select('t_pegawai.nama as dibukukan_oleh')
                        ->join('t_pegawai', 't_pegawai.id','=','t_barang_masuk.dibukukan_oleh')
                        ->where('t_barang_masuk.id', $id_barang_masuk)->first();
        
        $data_barang = M_master_barang::where('safe_delete', '=', '0')->get();


        return view('menu/v_rincian_barang_masuk',['data'=>$data_rincian_barang_masuk, 'data_barang_masuk'=>$data_barang_masuk, 'barang'=>$data_barang, 'diterima_dari'=>$diterima_dari, 'diperiksa_oleh'=>$diperiksa_oleh, 'diterima_oleh'=>$diterima_oleh, 'diketahui_oleh'=>$diketahui_oleh, 'dibukukan_oleh'=>$dibukukan_oleh]);
    }

    public function tambah(Request $request)
    {
        // dd($request);
        $post = new M_rincian_barang_masuk();

        $post->id_barang_masuk = $request->id_barang_masuk;
        $post->id_barang = $request->id_barang;
        $post->saldo_awal = $request->saldo_awal;
        $post->saldo_akhir = $request->saldo_akhir;
        $post->vol_menurut_faktur = $request->vol_menurut_faktur;
        $post->vol_menurut_kenyataan = $request->vol_menurut_kenyataan;
        $post->selisih = $request->selisih;
        $post->harga_satuan = $request->harga_satuan;
        $post->jumlah = $request->jumlah;
        $post->keterangan = $request->keterangan;        

        $post->save();
        return redirect('/rincian_barang_masuk/'.$request->id_barang_masuk);
    }

    public function edit(Request $request){
        // dd($request);

        M_rincian_barang_masuk::where('id',$request->id)
        ->update([
           'saldo_akhir' => $request->saldo_akhir_edit,
           'vol_menurut_faktur' => $request->vol_menurut_faktur,
           'vol_menurut_kenyataan' => $request->vol_menurut_kenyataan_edit,
           'selisih' => $request->selisih,
           'harga_satuan' => $request->harga_satuan,
           'jumlah' => $request->jumlah,
           'keterangan' => $request->keterangan,
         ]);

        return redirect('/rincian_barang_masuk/'.$request->id_barang_masuk);

    }

    public function delete($id)
    {
        M_rincian_barang_masuk::where('id',$id)->delete();

        return redirect()->back();
    }

    public function accept($id)
    {
        M_barang_masuk::where('id',$id)
        ->update([
           'status' => 1,
         ]);

        // ambil data rincian barang
        $data_barang_masuk = M_rincian_barang_masuk::where('id_barang_masuk', $id)->get();

        // looping data dan update data stok/ jumlah
        foreach ($data_barang_masuk as $barang_masuk) {
            
            // ambil data master barang
            $cek_data = M_master_barang::where('id', $barang_masuk->id_barang)->first();

            M_master_barang::where('id',$barang_masuk->id_barang)
            ->update([
               'jumlah' => $cek_data->jumlah+$barang_masuk->vol_menurut_kenyataan, //proses penambahan stok barang pada master
             ]);
        }
        
        return redirect('/rincian_barang_masuk/'.$id);
    }

    public function deny($id)
    {
        M_barang_masuk::where('id',$id)
        ->update([
           'status' => 0,
         ]);
        
        return redirect('/rincian_barang_masuk/'.$id);
    }

    public function cetak($id_barang_masuk)
    {
        // ambil data
        $data_rincian_barang_masuk = DB::table('t_rincian_barang_masuk')
                        ->select('t_rincian_barang_masuk.*', 't_master_barang.kode_barang as kode_barang', 't_master_barang.nama as nama_barang', 't_master_barang.satuan as satuan_barang')
                        ->join('t_master_barang', 't_master_barang.id','=','t_rincian_barang_masuk.id_barang')
                        ->where('t_rincian_barang_masuk.id_barang_masuk', $id_barang_masuk)->get();

        $data_barang_masuk = DB::table('t_barang_masuk')
                        ->select('t_barang_masuk.*', 'devisi.nama as nama_devisi')
                        ->join('devisi', 'devisi.id','=','t_barang_masuk.id_bagian')
                        ->where('t_barang_masuk.id', $id_barang_masuk)->first();

        $diterima_dari = DB::table('t_barang_masuk')
                        ->select('t_pegawai.nama as diterima_dari')
                        ->join('t_pegawai', 't_pegawai.id','=','t_barang_masuk.diterima_dari')
                        ->where('t_barang_masuk.id', $id_barang_masuk)->first();

        $diperiksa_oleh = DB::table('t_barang_masuk')
                        ->select('t_pegawai.nama as diperiksa_oleh')
                        ->join('t_pegawai', 't_pegawai.id','=','t_barang_masuk.diperiksa_oleh')
                        ->where('t_barang_masuk.id', $id_barang_masuk)->first();
        
        $diterima_oleh = DB::table('t_barang_masuk')
                        ->select('t_pegawai.nama as diterima_oleh')
                        ->join('t_pegawai', 't_pegawai.id','=','t_barang_masuk.diterima_oleh')
                        ->where('t_barang_masuk.id', $id_barang_masuk)->first();

        $diketahui_oleh = DB::table('t_barang_masuk')
                        ->select('t_pegawai.nama as diketahui_oleh')
                        ->join('t_pegawai', 't_pegawai.id','=','t_barang_masuk.diketahui_oleh')
                        ->where('t_barang_masuk.id', $id_barang_masuk)->first();

        $dibukukan_oleh = DB::table('t_barang_masuk')
                        ->select('t_pegawai.nama as dibukukan_oleh')
                        ->join('t_pegawai', 't_pegawai.id','=','t_barang_masuk.dibukukan_oleh')
                        ->where('t_barang_masuk.id', $id_barang_masuk)->first();

        return view('v_cetak_barang_masuk', ['data'=>$data_rincian_barang_masuk, 'data_barang_masuk'=>$data_barang_masuk, 'diterima_dari'=>$diterima_dari, 'diperiksa_oleh'=>$diperiksa_oleh, 'diterima_oleh'=>$diterima_oleh, 'diketahui_oleh'=>$diketahui_oleh, 'dibukukan_oleh'=>$dibukukan_oleh]);
    }
}
