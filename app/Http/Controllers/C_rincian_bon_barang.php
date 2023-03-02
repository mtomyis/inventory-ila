<?php

namespace App\Http\Controllers;

use App\M_bon_barang;
use App\M_rincian_bon_barang;
use App\M_master_barang;
use App\M_pegawai;
use App\M_devisi;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class C_rincian_bon_barang extends Controller
{
    public function index($id_bon_barang)
    {
        // ambil data bon barang bserta devisi
        $data_rincian_bon_barang = DB::table('t_rincian_bon_barang')
                        ->select('t_rincian_bon_barang.*', 't_master_barang.kode_barang as kode_barang', 't_master_barang.nama as nama_barang', 't_master_barang.satuan as satuan_barang')
                        ->join('t_master_barang', 't_master_barang.id','=','t_rincian_bon_barang.id_barang')
                        ->where('t_rincian_bon_barang.id_bon_barang', $id_bon_barang)->get();

        $data_bon_barang = DB::table('t_bon_barang')
                        ->select('t_bon_barang.*', 'devisi.nama as nama_devisi')
                        ->join('devisi', 'devisi.id','=','t_bon_barang.id_bagian')
                        ->where('t_bon_barang.id', $id_bon_barang)->first();
        
        $data_barang = M_master_barang::where('safe_delete', '=', '0')->get();


        return view('menu/v_rincian_bon_barang',['data'=>$data_rincian_bon_barang, 'data_bon_barang'=>$data_bon_barang, 'barang'=>$data_barang]);
    }

    public function tambah(Request $request)
    {
        // dd($request);
        $post = new M_rincian_bon_barang();

        $post->id_bon_barang = $request->id_bon_barang;
        $post->id_barang = $request->id_barang;
        $post->saldo_awal = $request->saldo_awal;
        $post->diminta = $request->diminta;
        $post->disetujui = $request->disetujui;
        $post->dikeluarkan = $request->dikeluarkan;
        $post->harga_satuan = $request->harga_satuan;
        $post->jumlah = $request->jumlah;
        $post->no_rekening = $request->no_rekening;
        $post->obyek = $request->obyek;        

        $post->save();
        return redirect('/rincian_bon_barang/'.$request->id_bon_barang);
    }

    public function edit(Request $request){
        // dd($request);

        M_rincian_bon_barang::where('id',$request->id)
        ->update([
           'diminta' => $request->diminta,
           'disetujui' => $request->disetujui,
           'dikeluarkan' => $request->dikeluarkan,
           'harga_satuan' => $request->harga_satuan,
           'jumlah' => $request->jumlah,
           'no_rekening' => $request->no_rekening,
           'obyek' => $request->obyek,
         ]);

        return redirect('/rincian_bon_barang/'.$request->id_bon_barang);

    }

    public function delete($id)
    {
        M_rincian_bon_barang::where('id',$id)->delete();

        return redirect()->back();
    }

    public function cek_barang(Request $request)
    {
        $data_barang = M_master_barang::where('id', $request->id)->first();

        echo json_encode($data_barang);
    }

    public function accept($id)
    {
        M_bon_barang::where('id',$id)
        ->update([
           'status' => 1,
         ]);

        // ambil data rincian barang
        $data_bon_barang = M_rincian_bon_barang::where('id_bon_barang', $id)->get();

        // looping data dan update data stok/ jumlah
        foreach ($data_bon_barang as $bon_barang) {
            
            // ambil data master barang
            $cek_data = M_master_barang::where('id', $bon_barang->id_barang)->first();

            M_master_barang::where('id',$bon_barang->id_barang)
            ->update([
               'jumlah' => $cek_data->jumlah-$bon_barang->dikeluarkan, //proses pengurangan stok barang pada master
             ]);
        }

        return redirect('/bon_barang');
    }

    public function deny($id)
    {
        M_bon_barang::where('id',$id)
        ->update([
           'status' => 0,
         ]);
        
        return redirect('/bon_barang');
    }
}
