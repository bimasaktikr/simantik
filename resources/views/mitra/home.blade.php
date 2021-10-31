@extends('layouts.app')
@section('page-css')
    <!-- DataTables -->
  <link rel="stylesheet" href="{{url('')}}/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="{{url('')}}/assets/dist/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="{{url('')}}/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="{{url('')}}/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
@endsection
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            {{-- <h1>Daftar users</h1> --}}
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">DataTables</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
                <div class="card-header">
                  <button class="btn-sm btn-primary" > Tambah Mitra</button>
                  {{-- <h3 class="card-title">DataTable with default features</h3> --}}

                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>ID</th>
                      <th>Nama</th>
                      <th>Email</th>
                      <th>Jenis Kelamin</th>
                      <th>Indeks Penilaian Kumulatif</th>
                      <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($user as $item)
                        <tr>
                            <th>{{ $item -> id }}</th>
                            <th>{{ $item -> name }}</th>
                            <th>{{ $item -> email }}</th>
                            <th>{{ $item -> gender }}</th>
                            <th>{{ $item -> ipk }}</th>
                            <th>
                                <div class="btn-group">
                                    <button class="btn-sm btn-info" id={{ $item -> id }}>detail</button>
                                    <button class="btn-sm btn-primary">edit</button>
                                    <button class="btn-sm btn-danger">delete</button>
                                </div>
                                
                            </th>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
</div>
  
@endsection

@section('js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>  
<script src="{{url('')}}/assets/dist/js/jquery.dataTables.min.js"></script>
<script src="{{url('')}}/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{url('')}}/assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{url('')}}/assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="{{url('')}}/assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="{{url('')}}/assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="{{url('')}}/assets/plugins/jszip/jszip.min.js"></script>
<script src="{{url('')}}/assets/plugins/pdfmake/pdfmake.min.js"></script>
<script src="{{url('')}}/assets/plugins/pdfmake/vfs_fonts.js"></script>
<script src="{{url('')}}/assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="{{url('')}}/assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="{{url('')}}/assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
@endsection

@section('script')
<script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script>
@endsection