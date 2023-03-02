@extends('template.template')
@section('content')
<div class="container-fluid">
    <!-- Content Row -->
    <div class="row">
        <div class="col-md-12">
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data Master Barang</h6>
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
                                    <th>Kode</th>
                                    <th>Nama</th>
                                    <th>Satuan / Ukuran</th>
                                    <th>Rak</th>
                                    <th>Jumlah</th>
                                    <th>Tanggal</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no=1; ?>
                                @foreach($data as $item)
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{$item->kode_barang}}</td>
                                    <td>{{$item->nama}}</td>
                                    <td>{{$item->satuan}} / {{$item->ukuran}}</td>
                                    <td>{{$item->rak}}</td>
                                    <td>{{$item->jumlah}}</td>
                                    <td>{{$item->tanggal}}</td>
                                    <td>
                                        <button class="text-white btn btn-primary" data-toggle="modal" data-target="#modal_edit-{{$item->id}}" type="button" title="edit data"><i class="fas fa-pencil-alt"></i></button>
                                        <a href="/delete-master_barang/{{$item->id}}" onclick="return confirm('Are you sure you want to delete this item?');" class="text-white btn btn-danger" type="button" title="hapus data"><i class="fas fa-trash-alt"></i></a>
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
                <form action="{{route('tambah_master_barang')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row ">
                        <div class="col-md-12 ">
                        <div class="form-group ">
                                <label class="form-label "><b>Kode barang</b></label>
                                <input type="text" class="form-control" id="kode_barang" name="kode_barang" required/>
                            </div>
                        </div>
                        <div class="col-md-12 ">
                        <div class="form-group ">
                                <label class="form-label "><b>Nama</b></label>
                                <input type="text" class="form-control" id="nama" name="nama" required/>
                            </div>
                        </div>
                        <div class="col-md-12 ">
                            <div class="form-group ">
                                <label class="form-label "><b>Satuan</b></label>
                                <select name="satuan" class="form-control" id="satuan">
                                    <option value="PCS">PCS</option>
                                    <option value="DUS">DUS</option>
                                    <option value="PACK">PACK</option>
                                    <option value="BAL">BAL</option>
                                </select>
                                <!-- <input type="text" class="form-control" id="satuan" name="satuan" required/> -->
                            </div>
                        </div>
                        <div class="col-md-6 ">
                            <div class="form-group ">
                                <label class="form-label "><b>Ukuran</b></label>
                                <select name="ukuran" class="form-control" id="ukuran">
                                    <option value="KG">KG</option>
                                    <option value="LITER">LITER</option>
                                    <option value="PETI">PETI</option>
                                    <option value="KALENG">KALENG</option>
                                </select>
                                <!-- <input type="text" class="form-control" id="ukuran" name="ukuran" required/> -->
                            </div>
                        </div>
                        <div class="col-md-6 ">
                            <div class="form-group ">
                                <label class="form-label "><b>Rak</b></label>
                                <input type="text" class="form-control" id="rak" name="rak" required/>
                            </div>
                        </div>
                        <div class="col-md-6 ">
                            <div class="form-group ">
                                <label class="form-label "><b>Tanggal</b></label>
                                <input type="date" class="form-control" id="tanggal" name="tanggal" required/>
                            </div>
                        </div>
                        <div class="col-md-6 ">
                            <div class="form-group ">
                                <label class="form-label "><b>Jumlah</b></label>
                                <input type="number" class="form-control" id="jumlah" name="jumlah" required/>
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
                <form action="{{route('edit_master_barang')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" value="{{$item->id}}" id="id" name="id" required/>
                    <div class="row ">
                    <div class="col-md-12 ">
                        <div class="form-group ">
                                <label class="form-label "><b>Kode barang</b></label>
                                <input type="text" class="form-control" value="{{$item->kode_barang}}" id="kode_barang" name="kode_barang" required/>
                            </div>
                        </div>
                        <div class="col-md-12 ">
                        <div class="form-group ">
                                <label class="form-label "><b>Nama</b></label>
                                <input type="text" class="form-control" value="{{$item->nama}}" id="nama" name="nama" required/>
                            </div>
                        </div>
                        <div class="col-md-12 ">
                            <div class="form-group ">
                                <label class="form-label "><b>Satuan</b></label>
                                <select name="satuan" class="form-control" id="satuan">
                                    <option selected value="{{$item->satuan}}">{{$item->satuan}}</option>
                                    <option value="PCS">PCS</option>
                                    <option value="DUS">DUS</option>
                                    <option value="PACK">PACK</option>
                                    <option value="BAL">BAL</option>
                                </select>
                                <!-- <input type="text" class="form-control" value="{{$item->satuan}}" id="satuan" name="satuan" required/> -->
                            </div>
                        </div>
                        <div class="col-md-6 ">
                            <div class="form-group ">
                                <label class="form-label "><b>Ukuran</b></label>
                                <select name="ukuran" class="form-control" id="ukuran">
                                    <option selected value="{{$item->ukuran}}">{{$item->ukuran}}</option>
                                    <option value="KG">KG</option>
                                    <option value="LITER">LITER</option>
                                    <option value="PETI">PETI</option>
                                    <option value="KALENG">KALENG</option>
                                </select>
                                <!-- <input type="text" class="form-control" value="{{$item->ukuran}}" id="ukuran" name="ukuran" required/> -->
                            </div>
                        </div>
                        <div class="col-md-6 ">
                            <div class="form-group ">
                                <label class="form-label "><b>Rak</b></label>
                                <input type="text" class="form-control" value="{{$item->rak}}" id="rak" name="rak" required/>
                            </div>
                        </div>
                        <div class="col-md-6 ">
                            <div class="form-group ">
                                <label class="form-label "><b>Tanggal</b></label>
                                <input type="date" class="form-control" value="{{$item->tanggal}}" id="tanggal" name="tanggal" required/>
                            </div>
                        </div>
                        <div class="col-md-6 ">
                            <div class="form-group ">
                                <label class="form-label "><b>Jumlah</b></label>
                                <input type="number" class="form-control" value="{{$item->jumlah}}" id="jumlah" name="jumlah" required/>
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