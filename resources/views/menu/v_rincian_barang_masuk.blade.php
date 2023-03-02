@extends('template.template')
@section('content')
<div class="container-fluid">
    <!-- Content Row -->
    <div class="row">
        <div class="col-md-12">
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data Rincian Barang Masuk</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group ">
                                <label class="form-label "><b>Nomor Dokumen</b></label>
                                <input type="text" class="form-control" id="nomor" value="{{$data_barang_masuk->nomor}}" name="nomor" readonly />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group ">
                                <label class="form-label "><b>Bagian / Devisi</b></label>
                                <input type="text" class="form-control" id="bagian" value="{{$data_barang_masuk->nama_devisi}}" name="bagian" readonly />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group ">
                                <label class="form-label "><b>Tanggal</b></label>
                                <input type="text" class="form-control" id="tanggal" value="{{$data_barang_masuk->tanggal}}" name="tanggal" readonly />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group ">
                                <label class="form-label "><b>Diterima Dari</b></label>
                                <input type="text" class="form-control" id="diterima_dari" value="{{$diterima_dari->diterima_dari}}" name="diterima_dari" readonly />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group ">
                                <label class="form-label "><b>Penerimaan Faktur No.</b></label>
                                <input type="text" class="form-control" id="no_bon_barang" value="{{$data_barang_masuk->no_bon_barang}}" name="no_bon_barang" readonly />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group ">
                                <label class="form-label "><b>OPL No.</b></label>
                                <input type="text" class="form-control" id="opl_no" value="{{$data_barang_masuk->opl_no}}" name="opl_no" readonly />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group ">
                                <label class="form-label "><b>Diperiksa Oleh</b></label>
                                <input type="text" class="form-control" id="diperiksa_oleh" value="{{$diperiksa_oleh->diperiksa_oleh}}" name="diperiksa_oleh" readonly />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group ">
                                <label class="form-label "><b>Disaksikan Oleh</b></label>
                                <input type="text" class="form-control" id="disaksikan_oleh" value="{{$data_barang_masuk->disaksikan_oleh}}" name="disaksikan_oleh" readonly />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group ">
                                <label class="form-label "><b>Diterima Oleh</b></label>
                                <input type="text" class="form-control" id="diterima_oleh" value="{{$diterima_oleh->diterima_oleh}}" name="diterima_oleh" readonly />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group ">
                                <label class="form-label "><b>Diketahui Oleh</b></label>
                                <input type="text" class="form-control" id="diketahui_oleh" value="{{$diketahui_oleh->diketahui_oleh}}" name="diketahui_oleh" readonly />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group ">
                                <label class="form-label "><b>Dibukukan Oleh</b></label>
                                <input type="text" class="form-control" id="dibukukan_oleh" value="{{$dibukukan_oleh->dibukukan_oleh}}" name="dibukukan_oleh" readonly />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6" style="display: flex; justify-content: flex-start;">
                            <div class="input-group-prepend">
                                <button <?php echo $disabled = ($data_barang_masuk->status == 1) ? "disabled" : "" ; ?> class="text-white btn btn-primary" data-toggle="modal" data-target="#modal_tambah" type="button" title="tambah data"><i class="fas fa-plus"></i> Tambah Data</button>
                            </div>
                        </div>
                        <div class="col-md-6" style="display: flex; justify-content: flex-end;">
                            <div class="input-group-prepend" style="margin-left: auto; margin-right: 0;">
                                <?php if($data_barang_masuk->status == 0){ ?>
                                <a href="/accept-transaksi_barang_masuk/{{$data_barang_masuk->id}}" onclick="return confirm('Apakah anda yakin ingin menyelesaikan transaksi ?');" class="text-white btn btn-success" title="tambah data"><i class="fas fa-check"></i> Selesaikan Transaksi</a>
                                <?php } else { ?>
                                <!-- <a href="/deny-transaksi_barang_masuk/{{$data_barang_masuk->id}}" onclick="return confirm('Apakah anda yakin ingin membatalkan transaksi ?');" class="text-white btn btn-danger" title="tambah data"><i class="fas fa-check"></i> Batalkan Transaksi</a> -->
                                <?php } ?>
                                <div style="margin: 5px;"></div>
                                <a href="/cetak-transaksi_barang_masuk/{{$data_barang_masuk->id}}" class="text-white btn btn-warning" target="_blank" title="tambah data"><i class="fas fa-check"></i> Cetak</a>
                            </div>
                        </div>
                    </div>   
                    <br>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th rowspan="2">Kode Barang</th>
                                    <th rowspan="2">Nama Barang</th>
                                    <th rowspan="2">Sat.</th>
                                    <th colspan="3" style="text-align: center;">Volumen Menurut</th>
                                    <th rowspan="2">Saldo Akhir</th>
                                    <th rowspan="2">Harga Satuan</th>
                                    <th rowspan="2">Jumlah</th>
                                    <th rowspan="2">Keterangan</th>
                                    <th rowspan="2">Action</th>
                                </tr>
                                <tr>
                                    <th>Faktur</th>
                                    <th>Kenyataan</th>
                                    <th>Selisih</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $item)
                                <tr>
                                    <td>{{$item->kode_barang}}</td>
                                    <td>{{$item->nama_barang}}</td>
                                    <td>{{$item->satuan_barang}}</td>
                                    <td>{{$item->vol_menurut_faktur}}</td>
                                    <td>{{$item->vol_menurut_kenyataan}}</td>
                                    <td>{{$item->selisih}}</td>
                                    <td>{{$item->saldo_akhir}}</td>
                                    <td>{{$item->harga_satuan}}</td>
                                    <td>{{$item->jumlah}}</td>
                                    <td>{{$item->keterangan}}</td>
                                    <td>
                                        <button <?php echo $disabled = ($data_barang_masuk->status == 1) ? "disabled" : "" ; ?> class="text-white btn btn-info" data-toggle="modal" data-target="#modal_edit" type="button" title="edit data"
                                            data-id="{{$item->id}}"
                                            data-id_barang_masuk="{{$data_barang_masuk->id}}"
                                            data-kode_barang="{{$item->kode_barang}}"
                                            data-nama_barang="{{$item->nama_barang}}"
                                            data-satuan="{{$item->satuan_barang}}"
                                            data-saldo_awal="{{$item->saldo_awal}}"
                                            data-saldo_akhir="{{$item->saldo_akhir}}"
                                            data-vol_menurut_faktur="{{$item->vol_menurut_faktur}}"
                                            data-vol_menurut_kenyataan="{{$item->vol_menurut_kenyataan}}"
                                            data-selisih="{{$item->selisih}}"
                                            data-harga_satuan="{{$item->harga_satuan}}"
                                            data-jumlah="{{$item->jumlah}}"
                                            data-keterangan="{{$item->keterangan}}"
                                            ><i class="fas fa-pencil-alt"></i></button>
                                        <a href="/delete-rincian_barang_masuk/{{$item->id}}" onclick="return confirm('Are you sure you want to delete this item?');" class="text-white btn btn-danger <?php echo $disabled = ($data_barang_masuk->status == 1) ? "disabled" : "" ; ?>" type="button" title="hapus data"><i class="fas fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<!-- Modal Tambah Data-->
<div class="modal fade" id="modal_tambah" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
            <div class="modal-body">
                <div class="container-fluid">
                <form action="{{route('tambah_rincian_barang_masuk')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" class="form-control" id="id_barang_masuk" name="id_barang_masuk" value="{{$data_barang_masuk->id}}" />
                    <div class="row ">
                        <div class="col-md-12 ">
                            <label class="form-label "><b>Kode barang</b></label>
                            <select name="id_barang" class="form-control" id="id_barang" onchange="pilih_barang()">
                                <option value="" selected disabled>Silahkan Pilih Kode Barang</option>
                                <?php foreach ($barang as $key) { ?>
                                <option value="{{ $key->id }}">{{ $key->kode_barang }} / {{$key->nama}}</option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group ">
                                <label class="form-label "><b>Nama Barang</b></label>
                                <input type="text" class="form-control" id="nama_barang" name="nama_barang" readonly required />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group ">
                                <label class="form-label "><b>Sat.</b></label>
                                <input type="text" class="form-control" id="satuan" name="satuan" readonly/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group ">
                                <label class="form-label "><b>Saldo Awal</b></label>
                                <input type="text" class="form-control" id="saldo_awal" name="saldo_awal" readonly />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group ">
                                <label class="form-label "><b>Saldo Akhir</b></label>
                                <input type="text" class="form-control" id="saldo_akhir" name="saldo_akhir" readonly />
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group ">
                                <label class="form-label "><b>Volumen Menurut Faktur</b></label>
                                <input type="text" class="form-control" id="vol_menurut_faktur" name="vol_menurut_faktur" required />
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group ">
                                <label class="form-label "><b>Volumen Menurut Kenyataan</b></label>
                                <input type="text" class="form-control" id="vol_menurut_kenyataan" name="vol_menurut_kenyataan" required />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group ">
                                <label class="form-label "><b>Selisih</b></label>
                                <input type="text" class="form-control" id="selisih" name="selisih" required />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group ">
                                <label class="form-label "><b>Harga Satuan</b></label>
                                <input type="text" class="form-control" id="harga_satuan" name="harga_satuan" />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group ">
                                <label class="form-label "><b>Jumlah</b></label>
                                <input type="text" class="form-control" id="jumlah" name="jumlah" />
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group ">
                                <label class="form-label "><b>Keterangan</b></label>
                                <input type="text" class="form-control" id="keterangan" name="keterangan"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Simpan Data</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal edit Data-->
<div class="modal fade" id="modal_edit" tabindex="-1" role="dialog" aria-labelledby="modelTitleId-{{$item->id}}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
            <div class="modal-body">
                <div class="container-fluid">
                <form action="{{route('edit_rincian_barang_masuk')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" value="" id="id" name="id" required/>
                    <input type="hidden" value="" id="id_barang_masuk" name="id_barang_masuk" required/>

                    <div class="row ">
                        <div class="col-md-12 ">
                            <div class="form-group ">
                                <label class="form-label "><b>Kode Barang</b></label>
                                <input type="text" class="form-control" id="kode_barang" name="kode_barang" readonly required value="" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group ">
                                <label class="form-label "><b>Nama Barang</b></label>
                                <input type="text" class="form-control" id="nama_barang" name="nama_barang" readonly required value="" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group ">
                                <label class="form-label "><b>Sat.</b></label>
                                <input type="text" class="form-control" id="satuan" name="satuan" value="" readonly/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group ">
                                <label class="form-label "><b>Saldo Awal</b></label>
                                <input value="" type="text" class="form-control" id="saldo_awal" name="saldo_awal" readonly />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group ">
                                <label class="form-label "><b>Saldo Akhir</b></label>
                                <input value="" type="text" class="form-control" id="saldo_akhir" name="saldo_akhir" readonly />
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group ">
                                <label class="form-label "><b>Volume Menurut Faktur</b></label>
                                <input value="" type="text" class="form-control" id="vol_menurut_faktur" name="vol_menurut_faktur" required />
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group ">
                                <label class="form-label "><b>Volume Menurut Kenyataan</b></label>
                                <input value="" type="text" class="form-control" id="vol_menurut_kenyataan" name="vol_menurut_kenyataan" required />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group ">
                                <label class="form-label "><b>Selisih</b></label>
                                <input value="" type="text" class="form-control" id="selisih" name="selisih" required />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group ">
                                <label class="form-label "><b>Harga Satuan</b></label>
                                <input value="" type="text" class="form-control" id="harga_satuan" name="harga_satuan" />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group ">
                                <label class="form-label "><b>Jumlah</b></label>
                                <input value="" type="text" class="form-control" id="jumlah" name="jumlah" />
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group ">
                                <label class="form-label "><b>Keterangan</b></label>
                                <input value="" type="text" class="form-control" id="keterangan" name="keterangan"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success">Edit Data</button>
            </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
    function pilih_barang() {
        var x = document.getElementById("id_barang").value;
        $.ajax({
            url : "{{ url('/cek_barang') }}",
            method : "post",
            data : {
                id : x,
                _token : "{{ csrf_token() }}"
            },
            success : function(data){
                let dt = JSON.parse(data)
                $('#nama_barang').val(dt.nama)
                $('#satuan').val(dt.satuan)
                $('#saldo_awal').val(dt.jumlah)
            }
        })
    }

</script>