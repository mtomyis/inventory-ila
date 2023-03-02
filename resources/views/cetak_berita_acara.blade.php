<style type="text/css">
	body {
  /* padding: .5in; */
	background-color: #fff;
	font-family: 'Times New Roman', sans-serif; 
	color: #000;
	font-size: 11pt;
	margin: 1cm 1.4cm 1cm 1cm;
}
</style>
<!-- header -->
<body>
	
<table style="margin-top: 0px; width: 99%; border: 1px solid black; border-collapse: collapse;">
	<tr>
		<td style="text-align: center; width: 33%; border: 1px solid black;">
			<p>
				<div>PT INDUSTRI GLENMORE</div>
				<div></div>
			</p>
		</td> 
		<td style="text-align: center; width: 33%; border: 1px solid black;">
			<p>
				<div>BERITA ACARA</div>
				<div>PENERIMAAN BARANG</div>
			</p>
		</td>
		<td style="text-align: center; width: 33%; border: 1px solid black;">
			<p>
				<div>TANGGAL :</div>
				<div>{{ $data->tanggal }}<!-- 08 Juni 2022 --></div>
			</p>
		</td>
	</tr>
</table>
<br><br>
<table style="width: 100%;">
	<tr>
		<td style="width: 33%;">Nama Barang</td>
		<td style="width: 1%;">:</td>
		<!-- <td style="width: 66%;">{{ $data->namabarang }} {{ $data->spesifikasibarang }}</td> -->
		<td style="width: 66%;">{{ $data->nama_barang }}</td>
	</tr>
	<tr>
		<td style="width: 33%;">Penerimaan Faktur</td>
		<td style="width: 1%;">:</td>
		<td style="width: 66%;">{{ $data->penerimaan_faktur }}</td>
	</tr>
	<tr>
		<td style="width: 33%;">OPL No</td>
		<td style="width: 1%;">:</td>
		<td style="width: 66%;">{{ $data->opl_no }}</td>
	</tr>
	<tr>
		<td style="width: 33%;">VOL Menurut Faktur</td>
		<td style="width: 1%;">:</td>
		<td style="width: 66%;">{{ $data->volume_menurut_faktur }}</td>
	</tr>
	<tr>
		<td style="width: 33%;">VOL Menurut Kenyataan</td>
		<td style="width: 1%;">:</td>
		<td style="width: 66%;">{{ $data->volume_menurut_kenyataan }}</td>
	</tr>
	<tr>
		<td style="width: 33%;">VOL Selisih</td>
		<td style="width: 1%;">:</td>
		<td style="width: 66%;">{{ $data->volume_selisih }}</td>
	</tr>
	<tr>
		<td style="width: 33%;">Keterangan</td>
		<td style="width: 1%;">:</td>
		<td style="width: 66%;">{{ $data->keterangan }}</td>
	</tr>
</table>
<br><br>
Pada saat barang diterima masih dalam keadaan tertutup/ tidak tertutup/ box/ __________________________________________________________________________________
<br>
Berita acara ini dibuat dengan sesungguhnya. Sesuai dengan kenyataan barang pada saat diterima.
<br><br>
<table style="width: 99%;">
	<tr>
		<td style="width: 33%%; text-align: center;">Saksi</td>
		<td style="width: 33%%; text-align: center;">Yang menyerahkan</td>
		<td style="width: 33%%; text-align: center;">Yang menerima</td>
	</tr>
	<tr>
		<td><br><br><br><br></td>
		<td></td>
		<td></td>
	</tr>
	<tr>
		<td style="width: 33%%; text-align: center;">{{ $data->saksi }}</td>
		<td style="width: 33%%; text-align: center;">{{ $data->yang_menyerahkan }}</td>
		<td style="width: 33%%; text-align: center;">{{ $data->yang_menerima }}</td>
	</tr>
</table>
<br><br>
<table style="width: 100%;">
	<tr>
		<td style="width: 50%;">
			<p>
				<div>Dibuat dalam rangkap 5 (lima)</div>
				<div>Disampaikan kepada :</div>
				<div>1.	Kantor Direksi IGG (Akuntansi)</div>
				<div>2.	Kantor Direksi/Pengadaan</div>
				<div>3.	Pengirimsebagai Lampiran Penagihan</div>
				<div>4.	Transport Untuk Lampiran Penagihan Ongkos Angkut</div>
				<div>5.	Arsip Bagian Penerima</div>
			</p>
		</td>
		<td style="width: 50%%; text-align: center;">
			<p>
				<div>Mengetahui</div>
				<div>Manajer/Ka.Bagian</div>
				<br><br><br><br>
				<div>{{ $data->mengetahui }}</div>
			</p>
		</td>
	</tr>
</table>
<br><br>
<div style="width: 100%;">
	<table style="margin: auto; width: 40%; border: 1px solid black; text-align: center;">
		<tr>
			<td>Catatan (Bila Terjadi Selisih)</td>
		</tr>
		<tr>
			<td>
				{{$data->catatan}}
				<br>
				<br>
				<br>
			</td>
		</tr>
	</table>
</div>
</body>
<script type="text/javascript">
	window.print();
	window.onfocus=function() {
		window.close();
	}
</script>