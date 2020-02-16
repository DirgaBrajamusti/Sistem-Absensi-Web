<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Sistem Absensi - Data Absensi</title>

  <!-- Custom fonts for this template-->
  <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="home">
        <div class="sidebar-brand-text mx-3">Sistem Absensi</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="home">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Data
      </div>

      <!-- Nav Item - Absensi -->
      <li class="nav-item active">
        <a class="nav-link" href="/absensi">
          <i class="fas fa-fw fa-users"></i>
          <span>Data Absensi</span></a>
      </li>

      <!-- Nav Item - Jurusan -->
      <li class="nav-item">
        <a class="nav-link" href="/jurusan">
          <i class="fas fa-fw fa-graduation-cap"></i>
          <span>Data Jurusan</span></a>
      </li>

      <!-- Nav Item - Dosen -->
      <li class="nav-item">
        <a class="nav-link" href="/dosen">
          <i class="fas fa-fw fa-user-tie"></i>
          <span>Data Dosen</span></a>
      </li>

      <!-- Nav Item - Kelas -->
      <li class="nav-item">
        <a class="nav-link" href="/kelas">
          <i class="fas fa-fw fa-school"></i>
          <span>Data Kelas</span></a>
      </li>

      <!-- Nav Item - Mata Kuliah -->
      <li class="nav-item">
        <a class="nav-link" href="/mata_kuliah">
          <i class="fas fa-fw fa-book"></i>
          <span>Data Mata Kuliah</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

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

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>
                <div class="fas fa-user"></div>
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
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
          <h1 class="h3 mb-4 text-gray-800">Data Absensi</h1>

          <!-- Absensi Card -->
          <div class="card shadow mb-4">
            <!-- Card Header - Accordion -->
            <a href="#AbsensiCard" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="absensiCard">
              <h6 class="m-0 font-weight-bold text-primary">Absensi Scanner</h6>
            </a>
            <!-- Card Content - Collapse -->
            <div class="collapse show" id="AbsensiCard">
              <div class="card-body">
                <div class="mx-auto" style="width:320px">
                  <video class="embed-responsive-item" width="320" height="240" id="qrscanner"></video>
                  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
                  <script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
                  <script src="{{ asset('js/scanner.js')}} "></script>
                </div>
              </div>
            </div>
          </div>

          <!-- Basic Card  -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Absensi</h6>
            </div>
            <div class="card-body">
              @if ($message = Session::get('success'))
              <div class="alert alert-success">
                <p>{{ $message }}</p>
              </div>
              @endif
              <a href="#" class="btn btn-primary btn-icon-split" data-toggle="modal" data-target="#addData">
                <span class="icon text-white-50">
                  <i class="fas fa-plus"></i>
                </span>
                <span class="text">Tambah Data Manual</span>
              </a>
              <div class="my-2"></div>
              <table id="absenTable" class="table table-bordered table-hover table-striped" style="width:100%">
                <thead>
                  <tr>
                    <th>NPM</th>
                    <th>Kelas</th>
                    <th>Mata Kuliah</th>
                    <th>Minggu</th>
                    <th>Tanggal</th>
                    <th>Pilihan</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($absensi as $a)
                  <tr>
                    <td>{{ $a->npm }}</td>
                    <td>{{ $a->kelas->nama_kelas }}</td>
                    <td>{{ $a->mata_kuliah->nama_mata_kuliah }}</td>
                    <td>{{ $a->minggu }}</td>
                    <td>{{ $a->created_at }}</td>
                    <td>
                      <a href="/absensi/edit/{{ $a->id }}" class="btn btn-secondary btn-icon-split btn-sm">
                        <span class="icon text-white-50">
                          <i class="fas fa-edit"></i>
                        </span>
                        <span class="text">Edit</span>
                      </a>
                      <a href="/absensi/hapus/{{ $a->id }}" class="btn btn-danger btn-icon-split btn-sm">
                        <span class="icon text-white-50">
                          <i class="fas fa-trash"></i>
                        </span>
                        <span class="text">Hapus</span>
                      </a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
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
            <span>Copyright &copy; Dirga Brajamusti & Fanny Shafira</span>
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
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
          <a class="btn btn-primary" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
          </a>

          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Add Modal Modal-->
  <div class="modal fade" id="addData" tabindex="-1" role="dialog" aria-labelledby="addDataModel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <form method="post" name="inputAbsen" action="/absensi/store">
          <div class="modal-header">
            <h5 class="modal-title" id="addDataModel">Tambah Data</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
            {{ csrf_field() }}

            <div class="form-group">
              <label>NPM</label>
              <input type="text" name="npm" id="npm" class="form-control" placeholder="NPM...">

              @if($errors->has('npm'))
              <div class="text-danger">
                {{ $errors->first('npm')}}
              </div>
              @endif

            </div>

            <div class="form-group">
              <label>Kelas</label>
              <select class="form-control" name="kelas_id" id="kelas_id">
                @foreach($kelas as $k)
                <option value=" {{ $k->id }} ">{{ $k->nama_kelas }}</option>
                @endforeach
              </select>

              @if($errors->has('kelas_id'))
              <div class="text-danger">
                {{ $errors->first('kelas_id')}}
              </div>
              @endif

            </div>

            <div class="form-group">
              <label>Mata Kuliah</label>
              <select class="form-control" name="mata_kuliah_id" id="mata_kuliah_id">
                @foreach($mata_kuliah as $m)
                <option value=" {{ $m->id }} ">{{ $m->nama_mata_kuliah }}</option>
                @endforeach
              </select>

              @if($errors->has('mata_kuliah_id'))
              <div class="text-danger">
                {{ $errors->first('mata_kuliah_id')}}
              </div>
              @endif

            </div>

            <div class="form-group">
              <label>Minggu</label>
              <input type="text" name="minggu" id="minggu" class="form-control" placeholder="Minggu ke...">

              @if($errors->has('minggu'))
              <div class="text-danger">
                {{ $errors->first('minggu')}}
              </div>
              @endif

            </div>
          </div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <input type="submit" class="btn btn-success" value="Simpan">
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>
	<script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.bootstrap4.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.colVis.min.js"></script>
  <script>
    $(document).ready(function() {
      var table = $('#absenTable').DataTable({
        lengthChange: false,
        buttons: ['copy', 'excel', 'pdf', 'print']
      });

      table.buttons().container()
        .appendTo('#absenTable_wrapper .col-md-6:eq(0)');
    });
  </script>

</body>

</html>