<style type="text/css">
	body {
  /* padding: .5in; */
	background-color: #fff;
	font-family: 'Times New Roman', sans-serif; 
	color: #000;
	font-size: 9pt;
	margin: 1cm 1cm 1cm 1cm;
}
</style>
<body>
	<table style="margin-top: 0px; width: 100%; border: 1px solid black; border-collapse: collapse;">
		<tr>
			<td style="width: 28%; text-align: left; width: 33%; border: 1px solid black;"><div>PT INDUSTRI GULA GLENMORE<br>BAGIAN : {{$data_barang_masuk->nama_devisi}}</div></td>
			<td style="width: 44%; border: 1px solid black;">
				<div style="text-align: center; ">BUKTI PENERIMAAN BARANG</div>Diterima dari : {{$diterima_dari->diterima_dari}}
			</td>
			<td style="width: 28%; text-align: left; width: 33%; border: 1px solid black;"><div>Nomor : {{$data_barang_masuk->nomor}} <br>Tanggal : {{$data_barang_masuk->tanggal}}</div></td>
		</tr>
	</table>
	<p></p>
	<table style="margin-top: 0px; width: 100%; border: 1px solid black; border-collapse: collapse;">
		<tr>
			<td rowspan="2" style="width: 10%; text-align: center; border: 1px solid black;">No. Barang</td>
			<td rowspan="2" style="width: 10%; text-align: center; border: 1px solid black;">Nama Barang</td>
			<td rowspan="2" style="width: 10%; text-align: center; border: 1px solid black;">Sat.</td>
			<td colspan="3" style="width: 30%; text-align: center; border: 1px solid black;">Volume</td>
			<td rowspan="2" style="width: 10%; text-align: center; border: 1px solid black;">Persediaan Setelah di Buku</td>
			<td rowspan="2" style="width: 10%; text-align: center; border: 1px solid black;">Harga Satuan</td>
			<td rowspan="2" style="width: 10%; text-align: center; border: 1px solid black;">Jumlah Harga</td>
			<td rowspan="2" style="width: 10%; text-align: center; border: 1px solid black;">Keterangan</td>
		</tr>
		<tr>
            <td style="width: 10%; text-align: center; border: 1px solid black;">Menurut Faktur</td>
            <td style="width: 10%; text-align: center; border: 1px solid black;">Menurut Kenyataan</td>
            <td style="width: 10%; text-align: center; border: 1px solid black;">Selisih</td>
        </tr>
        <tr>
        	<td colspan="7" style="border: 1px solid black;">Diisi Gudang Penerima Barang</td>
        	<td colspan="3" style="border: 1px solid black;">Diisi Bagian Pembukuan Kantor</td>
        </tr>
        <tr>
        	<td style="border: 1px solid black;"></td>
        	<td colspan="4" style="border: 1px solid black;">Penerimaan Faktur No. : {{$data_barang_masuk->no_bon_barang}} / OPL No. : {{$data_barang_masuk->opl_no}} </td>
        	<td style="border: 1px solid black;"></td>
        	<td style="border: 1px solid black;"></td>
        	<td style="border: 1px solid black;"></td>
        	<td style="border: 1px solid black;"></td>
        	<td style="border: 1px solid black;"></td>
        </tr>
        @foreach($data as $item)
        <tr>
        	<td style="border: 1px solid black;">{{$item->kode_barang}}</td>
        	<td style="border: 1px solid black;">{{$item->nama_barang}}</td>
        	<td style="border: 1px solid black;">{{$item->satuan_barang}}</td>
        	<td style="border: 1px solid black;">{{$item->vol_menurut_faktur}}</td>
        	<td style="border: 1px solid black;">{{$item->vol_menurut_kenyataan}}</td>
        	<td style="border: 1px solid black;">{{$item->selisih}}</td>
        	<td style="border: 1px solid black;">{{$item->saldo_akhir}}</td>
        	<td style="border: 1px solid black;">{{$item->harga_satuan}}</td>
        	<td style="border: 1px solid black;">{{$item->jumlah}}</td>
        	<td style="border: 1px solid black;">{{$item->keterangan}}</td>
        </tr>
        @endforeach
	</table>
	<p></p>
	<table style="margin-top: 0px; width: 100%; border: 1px solid black; border-collapse: collapse;">
		<tr>
			<td style="width: 20%; text-align: center; border: 1px solid black;">Diperiksa oleh</td>
			<td style="width: 20%; text-align: center; border: 1px solid black;">Disaksikan oleh</td>
			<td style="width: 20%; text-align: center; border: 1px solid black;">Diterima oleh</td>
			<td style="width: 20%; text-align: center; border: 1px solid black;">Diketahui oleh</td>
			<td style="width: 20%; text-align: center; border: 1px solid black;">Dibukukan oleh</td>
		</tr>
		<tr>
			<td style="text-align: center; border: 1px solid black;"><br><br><br><u style="">{{$diperiksa_oleh->diperiksa_oleh}}</u><br>Petugas</td>
			<td style="text-align: center; border: 1px solid black;"><br><br><br><u>{{$data_barang_masuk->disaksikan_oleh}}</u><br>Pengangkut</td>
			<td style="text-align: center; border: 1px solid black;"><br><br><br><u>{{$diterima_oleh->diterima_oleh}}</u><br>Bagian Gudang</td>
			<td style="text-align: center; border: 1px solid black;"><br><br><br><u>{{$diketahui_oleh->diketahui_oleh}}</u><br>Manajer</td>
			<td style="text-align: center; border: 1px solid black;"><br><br><br><u>{{$dibukukan_oleh->dibukukan_oleh}}</u><br>Petugas KVA</td>
		</tr>
	</table>
</body>

<script type="text/javascript">
  window.print();
  window.onfocus=function() {
    window.close();
  }
</script>