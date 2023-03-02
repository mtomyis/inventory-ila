<?php

namespace App\Http\Controllers;

use App\M_bon_barang;
use App\M_rincian_bon_barang;
use App\M_barang;
use App\M_pegawai;
use App\M_devisi;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class C_bon_barang extends Controller
{
    public function index()
    {
        // ambil data bon barang bserta devisi
        $data_bon_barang = DB::table('t_bon_barang')
                        ->select('t_bon_barang.*', 'devisi.nama as nama_devisi')
                        ->join('devisi', 'devisi.id','=','t_bon_barang.id_bagian')->get();
        
        // ambil data devisi dan pegawai untuk dropdown
        $devisi = M_devisi::all();
        $pegawai = M_pegawai::where('safe_delete', '=', '0')->get();

        // ambil data id terbaru untuk definisi nomor
        $last_id = DB::table('t_bon_barang')->latest('id')->first();

        if ($last_id) { // jika ada dokumen lain
            $nmr = str_split($last_id->nomor);
            $nomor = $nmr[8].$nmr[9].$nmr[10] + 1;
            $nomor_tiga_digit = sprintf("%03s", $nomor);
        }else{
            $nomor_tiga_digit = '001'; //jika tidak ada dokumen baru / kosoong
        }
        
        $romawi = $this->getRomawi(date('n'));
        
        $nomor_dokumen_now = 'IGG-BON-'.$nomor_tiga_digit.'-'.$romawi.'-'.date('Y');

        return view('menu/v_bon_barang',['data'=>$data_bon_barang, 'devisi'=>$devisi, 'pegawai'=>$pegawai, 'nomor'=>$nomor_dokumen_now]);
    }

    public function tambah(Request $request)
    {
        $post = new M_bon_barang();
        $post->id_bagian = $request->id_bagian;
        $post->nomor = $request->nomor;
        $post->tanggal = $request->tanggal;  

        $post->save();
        return redirect('/rincian_bon_barang/'.$post->id);
    }

    public function delete($id)
    {
        M_bon_barang::where('id',$id)->delete();
        M_rincian_bon_barang::where('id_bon_barang',$id)->delete();

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
