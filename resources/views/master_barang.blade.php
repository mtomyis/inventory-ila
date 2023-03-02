<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SIMBarang IGG</title>

    <!-- Custom fonts for this template -->
    <link href="admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="admin/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="admin/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">SIM Barang IGG </div>
            </a>



            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="http://127.0.0.1:8000/dashboard">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Nav Item - Tables -->
            <li class="nav-item active">
                <a class="nav-link" href="http://127.0.0.1:8000/master_barang">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Master Barang</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="http://127.0.0.1:8000/barang_masuk">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Barang Masuk</span></a>
            </li>

             <!-- Nav Item - Tables -->
             <li class="nav-item">
                <a class="nav-link" href="http://127.0.0.1:8000/berita_acara">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Berita Acara</span></a>
            </li>

             <!-- Nav Item - Tables -->
             <li class="nav-item">
                <a class="nav-link" href="http://127.0.0.1:8000/bon_barang">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Bon Barang</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="http://127.0.0.1:8000/laporan">
                <i class="fas fa-fw fa-file"></i>
                    <span>Laporan</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <li class="nav-item">
                <a class="nav-link" href="http://127.0.0.1:8000/barang">
                <i class="fas fa-fw fa-file"></i>
                    <span>Barang</span></a>
            </li>

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Ila Risqiya</span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Form Master Barang</h1>

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
                                            <!-- <input type="date" class="form-control tanggal" id="datefield" min="1899-01-01" name="tanggal"> -->
                                            <!-- <button class="btn btn-info ml-2" type="submit">Cari</button> -->
                                        </div>
                                </div>
                                <!-- <button class="text-white btn btn-primary font-italic pull-left" type="button" title="unduh"><i class="fa fa-download "></i>&emsp; Download.pdf</button> -->
                            </div>   
                            <br>
                        <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Nama Barang</th>
                                            <th>Spesifikasi</th>
                                            <th>Satuan</th>
                                            <th>Jumlah Barang</th>
                                            <th>No Rak</th>
                                            <th>Keterangan</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No.</th>
                                            <th>Nama Barang</th>
                                            <th>Spesifikasi</th>
                                            <th>Satuan</th>
                                            <th>Jumlah Barang</th>
                                            <th>No Rak</th>
                                            <th>Keterangan</th>
                                            <th>Action</th>

                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php $no=1; ?>
                                        @foreach($data as $item)
                                        <tr>
                                            <td>{{$no++}}</td>
                                            <td>{{$item->namabarang}}</td>
                                            <td>{{$item->spesifikasibarang}}</td>
                                            <td>{{$item->satuanbarang}}</td>
                                            <td>{{$item->saldo_akhir}}</td>
                                            <td>{{$item->no_rak}}</td>
                                            <td>{{$item->keterangan}}</td>
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
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2022</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

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
                      <form action="{{route('tambah_master')}}" method="POST" enctype="multipart/form-data">
                       @csrf
                        <div class="row ">
                            <div class="col-md-12 ">
                                <div class="form-group ">
                                    <label for="select_namabarang">Nama Barang</label>
                                    <select name="id_barang_masuk" class="form-control" id="select_namabarang">
                                        @foreach($option as $opsi)
                                        <option value="{{$opsi->id_barang_masuk}}">{{$opsi->namabarang}} - {{$opsi->spesifikasibarang}} - {{$opsi->faktur}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6" hidden>
                                <div class="form-group ">
                                    <label class="form-label "><b>Jumlah Barang</b></label>
                                    <input type="number" class="form-control" placeholder="Masukkan Jumlah Barang * " id="saldo" name="saldo" />
                                </div>
                            </div>
                            <div class="col-md-12 ">
                                <div class="form-group ">
                                    <label class="form-label "><b>No. Rak</b></label>
                                    <input type="text" class="form-control" placeholder="Masukkan No. Rak * " id="no_rak" name="no_rak" required=" " />
                                </div>
                            </div>
                             <div class="col-md-12 ">
                                <div class="form-group ">
                                    <label class="form-label "><b>Keterangan</b></label>
                                    <input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="Keterangan * "required/>
                                </div>
                            </div>
                          </div>
                            <br>
                      </div>
                  </div>
                  <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                    <button type="submit" class="btn btn-primary">Simpan Data</button>
                    </form>
                  </div>
              </div>
          </div>
      </div>

    <!-- Bootstrap core JavaScript-->
    <script src="admin/vendor/jquery/jquery.min.js"></script>
    <script src="admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="admin/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="admin/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="admin/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="admin/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="admin/js/demo/datatables-demo.js"></script>
    <script>
      
      $('#dataTable').DataTable( {
        "scrollX": false
            "columnDefs":[
                {
                    "orderable":false,
                    "targets":[10,11,12]
                }
            ]
        } );
  </script>

  <!-- Modal Tambah Data-->
@foreach($data as $item)
    <div class="modal fade" id="modal_edit-{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
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
                  <form action="{{route('edit_master')}}" method="POST" enctype="multipart/form-data">
                   @csrf
                    <input type="hidden" name="id" value="{{$item->id}}">
                    <input type="hidden" name="id_barang" value="{{$item->id_barang}}">
                    <div class="row ">
                        <div class="col-md-12 ">
                            <div class="form-group ">
                                <label for="select_namabarang">Nama Barang</label>
                                <select name="" class="form-control" id="select_namabarang" disabled>
                                    <option value="">{{$item->namabarang}} - {{$item->spesifikasibarang}} - {{$item->faktur}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 ">
                            <div class="form-group ">
                                <label class="form-label "><b>Jumlah Barang</b></label>
                                <input value="{{$item->saldo_akhir}}" type="number" class="form-control" placeholder="Masukkan Jumlah Barang * " id="saldo" name="saldo" required=" " />
                            </div>
                        </div>
                        <div class="col-md-6 ">
                            <div class="form-group ">
                                <label class="form-label "><b>No. Rak</b></label>
                                <input value="{{$item->no_rak}}" type="text" class="form-control" placeholder="Masukkan No. Rak * " id="no_rak" name="no_rak" required=" " />
                            </div>
                        </div>
                         <div class="col-md-6 ">
                            <div class="form-group ">
                                <label class="form-label "><b>Keterangan</b></label>
                                <input value="{{$item->keterangan}}" type="text" class="form-control" id="keterangan" name="keterangan" placeholder="Keterangan * "required/>
                            </div>
                        </div>
                      </div>
                        <br>
                  </div>
              </div>
              <div class="modal-footer">
                <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                <button type="submit" class="btn btn-primary">Simpan Data</button>
                </form>
              </div>
          </div>
      </div>
    </div>
@endforeach


</body>

</html>