@extends('template.template')
@section('content')
<div class="container-fluid">
    <!-- Content Row -->
    <div class="row">
        <div class="col-md-12">
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data Pegawai</h6>
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
                                    <th>Nama Pegawai</th>
                                    <th>Jabatan</th>
                                    <!-- <th>Devisi</th> -->
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no=1; ?>
                                @foreach($data as $item)
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{$item->nama}}</td>
                                    <td>{{$item->jabatan}}</td>
                                    <!-- <td>{{$item->devisi}}</td> -->
                                    <td>
                                        <button class="text-white btn btn-primary" data-toggle="modal" data-target="#modal_edit-{{$item->id}}" type="button" title="edit data"><i class="fas fa-pencil-alt"></i></button>
                                        <a href="/delete-pegawai/{{$item->id}}" onclick="return confirm('Are you sure you want to delete this item?');" class="text-white btn btn-danger" type="button" title="hapus data"><i class="fas fa-trash-alt"></i></a>
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
                <form action="{{route('tambah_pegawai')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row ">
                        <div class="col-md-12 ">
                        <div class="form-group ">
                                <label class="form-label "><b>Nama</b></label>
                                <input type="text" class="form-control" id="nama" name="nama" required/>
                            </div>
                        </div>
                        <div class="col-md-12 ">
                            <div class="form-group ">
                                <label class="form-label "><b>Jabatan</b></label>
                                <input type="text" class="form-control" id="jabatan" name="jabatan" required/>
                            </div>
                        </div>
                        <div class="col-md-12" hidden>
                            <div class="form-group ">
                                <label class="form-label "><b>Devisi</b></label>
                                <input type="text" class="form-control" id="devisi" name="devisi"/>
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
                <form action="{{route('edit_pegawai')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" value="{{$item->id}}" id="id" name="id" required/>
                    <div class="row ">
                        <div class="col-md-12 ">
                        <div class="form-group ">
                                <label class="form-label "><b>Nama</b></label>
                                <input type="text" class="form-control" value="{{$item->nama}}" id="nama" name="nama" required/>
                            </div>
                        </div>
                        <div class="col-md-12 ">
                            <div class="form-group ">
                                <label class="form-label "><b>Jabatan</b></label>
                                <input type="text" class="form-control" value="{{$item->jabatan}}" id="jabatan" name="jabatan" required/>
                            </div>
                        </div>
                        <div class="col-md-12" hidden>
                            <div class="form-group ">
                                <label class="form-label "><b>Devisi</b></label>
                                <input type="text" class="form-control" value="{{$item->devisi}}" id="devisi" name="devisi"/>
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