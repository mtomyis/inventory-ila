<?php

namespace App\Http\Controllers;

use App\M_barang_masuk;
use App\M_bon_barang;
use App\M_rincian_bon_barang;
use App\M_rincian_barang_masuk;
use App\M_barang;
use App\M_pegawai;
use App\M_devisi;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class C_barang_masuk extends Controller
{
    public function index()
    {
        // ambil data bon barang bserta devisi
        $data_barang_masuk = DB::table('t_barang_masuk')
                        ->select('t_barang_masuk.*', 'devisi.nama as nama_devisi', 't_pegawai.nama as nama_pegawai', 't_bon_barang.nomor as no_bon_barang')
                        ->join('devisi', 'devisi.id','=','t_barang_masuk.id_bagian')
                        ->join('t_pegawai', 't_pegawai.id','=','t_barang_masuk.diterima_dari')
                        ->join('t_bon_barang', 't_bon_barang.id','=','t_barang_masuk.no_bon_barang')
                        ->get();
        
        // ambil data devisi, no_bon_barang dan pegawai untuk dropdown
        $devisi = M_devisi::all();
        $pegawai = M_pegawai::where('safe_delete', '=', '0')->get();
        $data_bon_barang = M_bon_barang::all();

        // ambil data id terbaru untuk definisi nomor
        $last_id = DB::table('t_barang_masuk')->latest('id')->first();

        if ($last_id) { // jika ada dokumen lain
            $nmr = str_split($last_id->nomor);
            $nomor = $nmr[11].$nmr[12].$nmr[13] + 1;
            $nomor_tiga_digit = sprintf("%03s", $nomor);
        }else{
            $nomor_tiga_digit = '001'; //jika tidak ada dokumen baru / kosoong
        }
        
        $romawi = $this->getRomawi(date('n'));
        
        $nomor_dokumen_now = 'IGG-RETURN-'.$nomor_tiga_digit.'-'.$romawi.'-'.date('Y');

        return view('menu/v_barang_masuk',['data'=>$data_barang_masuk, 'data_bon_barang'=>$data_bon_barang, 'devisi'=>$devisi, 'pegawai'=>$pegawai, 'nomor'=>$nomor_dokumen_now]);
    }

    public function tambah(Request $request)
    {
        $post = new M_barang_masuk();
        $post->id_bagian = $request->id_bagian;
        $post->nomor = $request->nomor;
        $post->tanggal = $request->tanggal;  
        $post->diterima_dari = $request->diterima_dari;
        $post->no_bon_barang = $request->no_bon_barang;
        $post->opl_no = $request->opl_no;
        $post->diperiksa_oleh = $request->diperiksa_oleh;
        $post->disaksikan_oleh = $request->disaksikan_oleh;
        $post->diterima_oleh = $request->diterima_oleh;
        $post->diketahui_oleh = $request->diketahui_oleh;
        $post->dibukukan_oleh = $request->dibukukan_oleh;

        $post->save();
        return redirect('/rincian_barang_masuk/'.$post->id);
    }

    public function delete($id)
    {
        M_barang_masuk::where('id',$id)->delete();
        M_rincian_barang_masuk::where('id_barang_masuk',$id)->delete();

        return redirect()->back();
    }

    public function getRomawi($bln)
    {
        switch ($bln){
            case 1:
                return "I";
                break;
            case 2:
                return "II";
                break;
            case 3:
                return "III";
                break;
            case 4:
                return "IV";
                break;
            case 5:
                return "V";
                break;
            case 6:
                return "VI";
                break;
            case 7:
                return "VII";
                break;
            case 8:
                return "VIII";
                break;
            case 9:
                return "IX";
                break;
            case 10:
                return "X";
                break;
            case 11:
                return "XI";
                break;
            case 12:
                return "XII";
                break;
        }
    }

}
