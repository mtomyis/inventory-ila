@extends('template.template')
@section('content')
<div class="container-fluid">
    <!-- Content Row -->
    <div class="row">
        <div class="col-md-12">
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data Rincian Barang Keluar (Bon)</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group ">
                                <label class="form-label "><b>Nomor Dokumen</b></label>
                                <input type="text" class="form-control" id="nomor" value="{{$data_bon_barang->nomor}}" name="nomor" readonly />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group ">
                                <label class="form-label "><b>Bagian / Devisi</b></label>
                                <input type="text" class="form-control" id="bagian" value="{{$data_bon_barang->nama_devisi}}" name="bagian" readonly />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group ">
                                <label class="form-label "><b>Tanggal</b></label>
                                <input type="text" class="form-control" id="tanggal" value="{{$data_bon_barang->tanggal}}" name="tanggal" readonly />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6" style="display: flex; justify-content: flex-start;">
                            <div class="input-group-prepend">
                                <button <?php echo $disabled = ($data_bon_barang->status == 1) ? "disabled" : "" ; ?> class="text-white btn btn-primary" data-toggle="modal" data-target="#modal_tambah" type="button" title="tambah data"><i class="fas fa-plus"></i> Tambah Data</button>
                            </div>
                        </div>
                        <div class="col-md-6" style="display: flex; justify-content: flex-end;">
                            <div class="input-group-prepend" style="margin-left: auto; margin-right: 0;">
                                <?php if($data_bon_barang->status == 0){ ?>
                                <a href="/accept-transaksi_bon_barang/{{$data_bon_barang->id}}" onclick="return confirm('Apakah anda yakin ingin menyelesaikan transaksi ?');" class="text-white btn btn-success" title="tambah data"><i class="fas fa-check"></i> Selesaikan Transaksi</a>
                                <?php } else {} ?>
                            </div>
                        </div>
                    </div>  
                    <br>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Kode Barang</th>
                                    <th>Nama Barang</th>
                                    <th>Sat.</th>
                                    <th>Saldo Awal</th>
                                    <th>Diminta</th>
                                    <th>Disetujui</th>
                                    <th>Dikeluarkan</th>
                                    <th>Harga Satuan</th>
                                    <th>Jumlah</th>
                                    <th>No. Rek</th>
                                    <th>Obyek</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $item)
                                <tr>
                                    <td>{{$item->kode_barang}}</td>
                                    <td>{{$item->nama_barang}}</td>
                                    <td>{{$item->satuan_barang}}</td>
                                    <td>{{$item->saldo_awal}}</td>
                                    <td>{{$item->diminta}}</td>
                                    <td>{{$item->disetujui}}</td>
                                    <td>{{$item->dikeluarkan}}</td>
                                    <td>{{$item->harga_satuan}}</td>
                                    <td>{{$item->jumlah}}</td>
                                    <td>{{$item->no_rekening}}</td>
                                    <td>{{$item->obyek}}</td>
                                    <td>
                                        <button <?php echo $disabled = ($data_bon_barang->status == 1) ? "disabled" : "" ; ?> class="text-white btn btn-primary" data-toggle="modal" data-target="#modal_edit-{{$item->id}}" type="button" title="edit data"><i class="fas fa-pencil-alt"></i></button>
                                        <a href="/delete-rincian_bon_barang/{{$item->id}}" onclick="return confirm('Are you sure you want to delete this item?');" class="text-white btn btn-danger <?php echo $disabled = ($data_bon_barang->status == 1) ? "disabled" : "" ; ?>" type="button" title="hapus data"><i class="fas fa-trash-alt"></i></a>
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
                <form action="{{route('tambah_rincian_bon_barang')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" class="form-control" id="id_bon_barang" name="id_bon_barang" value="{{$data_bon_barang->id}}" />
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
                        <div class="col-md-12">
                            <div class="form-group ">
                                <label class="form-label "><b>Saldo Awal</b></label>
                                <input type="text" class="form-control" id="saldo_awal" name="saldo_awal" readonly />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group ">
                                <label class="form-label "><b>Diminta</b></label>
                                <input type="text" class="form-control" id="diminta" name="diminta" required />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group ">
                                <label class="form-label "><b>Disetujui</b></label>
                                <input type="text" class="form-control" id="disetujui" name="disetujui" required />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group ">
                                <label class="form-label "><b>Dikeluarkan</b></label>
                                <input type="text" class="form-control" id="dikeluarkan" name="dikeluarkan" required />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group ">
                                <label class="form-label "><b>Harga Satuan</b></label>
                                <input type="text" class="form-control" id="harga_satuan" name="harga_satuan" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group ">
                                <label class="form-label "><b>Jumlah</b></label>
                                <input type="text" class="form-control" id="jumlah" name="jumlah" />
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group ">
                                <label class="form-label "><b>No. Rekening</b></label>
                                <input type="text" class="form-control" id="no_rekening" name="no_rekening" />
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group ">
                                <label class="form-label "><b>Obyek</b></label>
                                <input type="text" class="form-control" id="obyek" name="obyek"/>
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
@foreach($data as $item)
<div class="modal fade" id="modal_edit-{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId-{{$item->id}}" aria-hidden="true">
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
                <form action="{{route('edit_rincian_bon_barang')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" value="{{$item->id}}" id="id" name="id" required/>
                    <input type="hidden" value="{{$item->id_bon_barang}}" id="id_bon_barang" name="id_bon_barang" required/>

                    <div class="row ">
                        <div class="col-md-12 ">
                            <div class="form-group ">
                                <label class="form-label "><b>Kode Barang</b></label>
                                <input type="text" class="form-control" id="kode_barang" name="kode_barang" readonly required value="{{$item->kode_barang}}" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group ">
                                <label class="form-label "><b>Nama Barang</b></label>
                                <input type="text" class="form-control" id="nama_barang" name="nama_barang" readonly required value="{{$item->nama_barang}}" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group ">
                                <label class="form-label "><b>Sat.</b></label>
                                <input type="text" class="form-control" id="satuan" name="satuan" value="{{$item->satuan_barang}}" readonly/>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group ">
                                <label class="form-label "><b>Saldo Awal</b></label>
                                <input value="{{$item->saldo_awal}}" type="text" class="form-control" id="saldo_awal" name="saldo_awal" readonly />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group ">
                                <label class="form-label "><b>Diminta</b></label>
                                <input value="{{$item->diminta}}" type="text" class="form-control" id="diminta" name="diminta" required />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group ">
                                <label class="form-label "><b>Disetujui</b></label>
                                <input value="{{$item->disetujui}}" type="text" class="form-control" id="disetujui" name="disetujui" required />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group ">
                                <label class="form-label "><b>Dikeluarkan</b></label>
                                <input value="{{$item->dikeluarkan}}" type="text" class="form-control" id="dikeluarkan" name="dikeluarkan" required />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group ">
                                <label class="form-label "><b>Harga Satuan</b></label>
                                <input value="{{$item->harga_satuan}}" type="text" class="form-control" id="harga_satuan" name="harga_satuan" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group ">
                                <label class="form-label "><b>Jumlah</b></label>
                                <input value="{{$item->jumlah}}" type="text" class="form-control" id="jumlah" name="jumlah" />
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group ">
                                <label class="form-label "><b>No. Rekening</b></label>
                                <input value="{{$item->no_rekening}}" type="text" class="form-control" id="no_rekening" name="no_rekening" />
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group ">
                                <label class="form-label "><b>Obyek</b></label>
                                <input value="{{$item->obyek}}" type="text" class="form-control" id="obyek" name="obyek"/>
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
@endforeach

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