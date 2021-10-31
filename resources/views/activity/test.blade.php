@extends('layouts.app')

@push('page-css')
    {{-- DATATABLES --}}
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.1/css/jquery.dataTables.css">
    

@endpush

@section('content')
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
    <div class="card">
        <div class="card-header">
            DAFTAR KEGIATAN
        </div>
        
        <div class="card-body">
            <div class="row">
                
                
            </div>
    
             {{-- {{$dataTable->table()}} --}}
            <table class="table table-bordered" id="my-table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nama</th>
                        <th>Kegiatan</th>
                        <th>Seksi</th>
                        <th>Waktu</th>
                        <th>Kualitas</th>
                        <th>Sikap</th>
                        <th>IPK</th>
                        
                    </tr>
                </thead>
                <tbody>
                    
                </tbody>
            </table>
        </div>
    </div>
        <!-- MULAI TOMBOL TAMBAH -->
    {{-- <a href="javascript:void(0)" class="btn btn-info" id="tombol-tambah">Tambah PEGAWAI</a>
    <br><br> --}}

      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    
  </div>

@endsection

@push('library-js')
 <!-- LIBARARY JS -->
 
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"
 integrity="sha256-sPB0F50YUDK0otDnsfNHawYmA5M0pjjUf4TvRJkGFrI=" crossorigin="anonymous"></script>

 <script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.js"
        integrity="sha256-siqh9650JHbYFKyZeTEAhq+3jvkFCG8Iz+MHdr9eKrw=" crossorigin="anonymous"></script>
 <!-- AKHIR LIBARARY JS -->
@endpush
@push('scripts')
    <script>

        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });

        //TOMBOL TAMBAH DATA
        //jika tombol-tambah diklik maka
        $(document).ready(function(){
        
            $('#my-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('activity.index') }}',
                columns: [
                  { data: 'id', name: 'id'},
                  { data: 'mitra', 
                    name: 'mitra.name'
                  },
                  { data: 'job', name: 'job.name'},
                  { data: 'division', name: 'division.name'},
                  { data: 'waktu', name: 'waktu'},
                  { data: 'kualitas', name: 'kualitas'},
                  { data: 'sikap', name: 'sikap'},
                  { data: 'ipk', name: 'ipk'}
               ]
            });
        });


    </script>
@endpush