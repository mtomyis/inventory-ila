@extends('template.template')
@section('content')
<div class="container-fluid">
    <!-- Content Row -->
    <div class="row">
        <div class="col-md-12">
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data Barang Masuk</h6>
                </div>
                <div class="card-body">
                    <div class="row-3 pull-right">
                        <div class="btn-group submitter-group ">
                                <div class="input-group-prepend">
                                    <button class="text-white btn btn-primary" data-toggle="modal" data-target="#modal_tambah" type="button" title="tambah data"><i class="fas fa-plus"></i> Tambah Data</button>
                                </div>
                        </div>
                    </div>   
                    <br>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nomor Dokumen</th>
                                    <th>Bagian</th>
                                    <th>Tanggal</th>
                                    <th>Diterima dari</th>
                                    <th>Nomor Dok. Bon Barang</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no=1; ?>
                                @foreach($data as $item)
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{$item->nomor}}</td>
                                    <td>{{$item->nama_devisi}}</td>
                                    <td>{{$item->tanggal}}</td>
                                    <td>{{$item->nama_pegawai}}</td>
                                    <td>{{$item->no_bon_barang}}</td>
                                    <td>
                                        <a href="{{ url('/rincian_barang_masuk/'.$item->id) }}" class="text-white btn btn-primary" ><i class="fas fa-list-alt"></i></a>
                                        <button <?php echo $disabled = ($item->status == 1) ? "disabled" : "" ; ?> class="text-white btn btn-primary" data-toggle="modal" data-target="#modal_edit-{{$item->id}}" type="button" title="edit data"><i class="fas fa-pencil-alt"></i></button>
                                        <a href="/delete-barang_masuk/{{$item->id}}" onclick="return confirm('Are you sure you want to delete this item?');" class="text-white btn btn-danger <?php echo $disabled = ($item->status == 1) ? "disabled" : "" ; ?>" type="button" title="hapus data"><i class="fas fa-trash-alt"></i></a>
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
                <form action="{{route('tambah_barang_masuk')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row ">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label "><b>Nomor</b></label>
                                <input type="text" placeholder="IGG-BON-001-VI-2022" value="{{ $nomor }}" class="form-control" id="nomor" name="nomor" required readonly />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group ">
                                <label class="form-label "><b>Tanggal</b></label>
                                <input type="date" class="form-control" id="tanggal" name="tanggal" required/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group ">
                                <label class="form-label "><b>Bagian</b></label>
                                <select name="id_bagian" class="form-control" id="id_bagian">
                                <!-- onchange="pilih()" -->
                                    <?php foreach ($devisi as $key) { ?>
                                    <option value="{{ $key->id }}">{{ $key->nama }}</option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group ">
                                <label class="form-label "><b>Diterima Dari</b></label>
                                <select name="diterima_dari" class="form-control" id="diterima_dari">
                                <!-- onchange="pilih()" -->
                                    <?php foreach ($pegawai as $key) { ?>
                                    <option value="{{ $key->id }}">{{ $key->nama }} - {{ $key->jabatan }}</option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group ">
                                <label class="form-label "><b>Penerimaan Faktur No.</b></label>
                                <select name="no_bon_barang" class="form-control" id="no_bon_barang">
                                <!-- onchange="pilih()" -->
                                    <?php foreach ($data_bon_barang as $key) { ?>
                                    <option value="{{ $key->id }}">{{ $key->nomor }}</option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group ">
                                <label class="form-label "><b>OPL No.</b></label>
                                <input type="text" class="form-control" id="opl_no" name="opl_no" required/>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group ">
                                <label class="form-label "><b>Disaksikan Oleh.</b></label>
                                <input type="text" class="form-control" id="disaksikan_oleh" name="disaksikan_oleh" required/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group ">
                                <label class="form-label "><b>Diperiksa Oleh</b></label>
                                <select name="diperiksa_oleh" class="form-control" id="diperiksa_oleh">
                                <!-- onchange="pilih()" -->
                                    <?php foreach ($pegawai as $key) { ?>
                                    <option value="{{ $key->id }}">{{ $key->nama }} - {{ $key->jabatan }}</option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group ">
                                <label class="form-label "><b>Diterima Oleh</b></label>
                                <select name="diterima_oleh" class="form-control" id="diterima_oleh">
                                <!-- onchange="pilih()" -->
                                    <?php foreach ($pegawai as $key) { ?>
                                    <option value="{{ $key->id }}">{{ $key->nama }} - {{ $key->jabatan }}</option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group ">
                                <label class="form-label "><b>Diketahui Oleh</b></label>
                                <select name="diketahui_oleh" class="form-control" id="diketahui_oleh">
                                <!-- onchange="pilih()" -->
                                    <?php foreach ($pegawai as $key) { ?>
                                    <option value="{{ $key->id }}">{{ $key->nama }} - {{ $key->jabatan }}</option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group ">
                                <label class="form-label "><b>Dibukukan Oleh</b></label>
                                <select name="dibukukan_oleh" class="form-control" id="dibukukan_oleh">
                                <!-- onchange="pilih()" -->
                                    <?php foreach ($pegawai as $key) { ?>
                                    <option value="{{ $key->id }}">{{ $key->nama }} - {{ $key->jabatan }}</option>
                                    <?php } ?>
                                </select>
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

@endforeach