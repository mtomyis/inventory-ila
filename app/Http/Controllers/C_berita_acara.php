<?php

namespace App\Http\Controllers;

use App\M_berita_acara;
use App\M_barang;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class C_berita_acara extends Controller
{
    public function index()
    {
        // status 0 = aktif
        // status 1 = sudah di print
        // $data_berita_acara = DB::table('berita_acara')
        //                 ->select('berita_acara.*', 'barang.nama_barang as namabarang', 'barang.satuan as satuanbarang','barang.spesifikasi as spesifikasibarang')
        //                 ->join('barang', 'barang.id','=','berita_acara.id_barang')
        //                 ->where(array('barang.safe_delete' => '0'))->get();

        $data_berita_acara = M_berita_acara::get();

        $data_option = M_barang::where('safe_delete', '=', '0')->get();
        return view('berita_acara', ['data'=>$data_berita_acara,'option'=>$data_option]);
    }

    public function tambah(Request $request)
    {
        // dd($request);
        $post = new M_berita_acara();
        $post->tanggal = $request->tanggal;
        // $post->id_barang = $request->id_barang;
        $post->nama_barang = $request->nama_barang;
        $post->saksi = $request->saksi;
        $post->yang_menyerahkan = $request->yang_menyerahkan;
        $post->yang_menerima = $request->yang_menerima;
        $post->penerimaan_faktur = $request->penerimaan_faktur;
        $post->opl_no = $request->opl_no;
        $post->volume_menurut_faktur = $request->volume_menurut_faktur;
        $post->volume_menurut_kenyataan = $request->volume_menurut_kenyataan;
        $post->volume_selisih = $request->volume_selisih;
        $post->keterangan = $request->keterangan;
        $post->mengetahui = $request->mengetahui;
        $post->catatan = $request->catatan;
        $post->status = 0;

        // status 0 = berita_acara aktif
        // status 1 = berita_acara sudah diprint

        $post->save();
        return redirect('/berita_acara');
    }

    public function edit(Request $request){

        // dd($request);
        M_berita_acara::where('id',$request->id)
        ->update([
            'tanggal' => $request->tanggal,
            // 'id_barang' => $request->id_barang,
            'nama_barang' => $request->nama_barang,
            'saksi' => $request->saksi,
            'yang_menyerahkan' => $request->yang_menyerahkan,
            'yang_menerima' => $request->yang_menerima,
            'penerimaan_faktur' => $request->penerimaan_faktur,
            'opl_no' => $request->opl_no,
            'volume_menurut_faktur' => $request->volume_menurut_faktur,
            'volume_menurut_kenyataan' => $request->volume_menurut_kenyataan,
            'volume_selisih' => $request->volume_selisih,
            'keterangan' => $request->keterangan,
            'mengetahui' => $request->mengetahui,
            'catatan' => $request->catatan,
            // 'status' => 0,

         ]);
        return redirect()->back();
    }

    public function delete($id)
    {
        M_berita_acara::where('id',$id)->delete();
        return redirect()->back();
    }

    public function cetak($id)
    {
        $data_berita_acara = DB::table('berita_acara')
                            ->select('berita_acara.*', 'barang.nama_barang as namabarang', 'barang.spesifikasi as spesifikasibarang')
                            ->join('barang', 'barang.id','=','berita_acara.id_barang')
                            ->where(array('berita_acara.id' => $id))->first();
        $data_berita_acara = M_berita_acara::where('id', $id)->first();


        // dd($data_berita_acara);
        return view('cetak_berita_acara', ['data'=>$data_berita_acara]);

    }
}
