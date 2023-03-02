<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SIMBarang IGG</title>

    <!-- Custom fonts for this template-->
    <link href="admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="admin/css/sb-admin-2.min.css" rel="stylesheet">

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
            <li class="nav-item">
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
            <li class="nav-item active">
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
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Laporan</h1>
                    </div>
    <!-- Modal Tambah Data-->
    <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
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
                      <form action="" method="POST" enctype="multipart/form-data">
                               
                                <div class="row ">
                                    <div class="col-md-6 ">
                                        <div class="form-group ">
                                            <label class="form-label "><b>Nama Barang</b></label>
                                            <input type="text " class="form-control " placeholder="Masukkan Nama Barang * " id="name " name="nama " required=" " />
                                        </div>
                                    </div>
                                    <div class="col-md-6 ">
                                        <div class="form-group ">
                                            <label class="form-label "><b>Sat</b></label>
                                            <input type="text " class="form-control " placeholder="Satuan * " id="harga " name="harga " required=" " />
                                        </div>
                                    </div>
                                    <div class="col-md-6 ">
                                    <div class="form-group ">
                                            <label class="form-label "><b>Volume Faktur</b></label>
                                            <input type="text " class="form-control " placeholder="Masukkan Vol faktur * " id="harga " name="harga " required=" " />
                                        </div>
                                    </div>
                                    <div class="col-md-6 ">
                                        <div class="form-group ">
                                            <label class="form-label "><b>Jumlah Barang</b></label>
                                            <input type="text " class="form-control " placeholder="Masukkan Jumlah Barang * " id="asal " name="asal " required=" " />
                                        </div>
                                    </div>
                                    <div class="col-md-6 ">
                                        <div class="form-group ">
                                            <label class="form-label "><b>Selisih Barang</b></label>
                                            <input type="text " class="form-control " placeholder="Masukkan Selisih Barang * " id="desc " name="desc " required=" " />
                                        </div>
                                    </div>
                                  </div>

                               
                                    <br>
                                </form>
                      </div>
                  </div>
                  <div class="modal-footer">
                      <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                      <button type="button" class="btn btn-primary">Simpan Data</button>
                  </div>
              </div>
          </div>
      </div>

      <script>
          $('#exampleModal').on('show.bs.modal', event => {
              var button = $(event.relatedTarget);
              var modal = $(this);
              // Use above variables to manipulate the DOM
              
          });
      </script>
                    <!-- Content Row -->
                    <div class="row">

                        <!-- Master Barang Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="h6 mb-0 font-weight-bold text-primary text-uppercase mb-1">
                                                Master Barang</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">___</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-table fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                               <div><center>
                                   <a href="{{url('/detail_master_barang')}}"><button type="button" class="btn btn-outline-primary" src ><i class="fas fa-eye"></i>Lihat</button></center></div></a>
                               <!-- <button class="text-white btn btn-success" data-toggle="modal" data-target="#modelId" type="button" title="tambah data"><i class="fas fa-plus"></i> </button> -->
                            </div>
                        </div> 

                        <!-- Barang Masuk Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="h6 mb-0 font-weight-bold text-primary text-uppercase mb-1">
                                                Barang Masuk</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">___</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-table fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                               <div><center>
                               <a href="{{url('/detail_barang_masuk')}}"><button type="button" class="btn btn-outline-primary"><i class="fas fa-eye"></i>Lihat</button></center></div></a>
                            </div>
                        </div> 

                        <!-- Berita Acara Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="h6 mb-0 font-weight-bold text-primary text-uppercase mb-1">
                                                Berita Acara</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">___</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-table fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                               <div>
                               <a href="{{url('/detail_berita_acara')}}"><center><button type="button" class="btn btn-outline-primary"><i class="fas fa-eye"></i>Lihat</button></center></div></a>
                            </div>
                        </div> 

                        <!-- Bon Barang Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="h6 mb-0 font-weight-bold text-primary text-uppercase mb-1">
                                                Bon Barang</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">___</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-table fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                               <div>
                               <a href="{{url('/detail_bon_barang')}}"><center><button type="button" class="btn btn-outline-primary"><i class="fas fa-eye"></i>Lihat</button></center></div></a>
                            </div>
                        </div> 

                    <!-- Content Row -->

                    <div class="row">
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

    <!-- Bootstrap core JavaScript-->
    <script src="admin/vendor/jquery/jquery.min.js"></script>
    <script src="admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="admin/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="admin/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="admin/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="admin/js/demo/chart-area-demo.js"></script>
    <script src="admin/js/demo/chart-pie-demo.js"></script>

</body>

</html>