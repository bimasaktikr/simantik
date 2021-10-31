@extends('layouts.app')

@push('page-css')
    {{-- DATATABLES --}}
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.1/css/jquery.dataTables.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.css"
    integrity="sha256-pODNVtK3uOhL8FUNWWvFQK0QoQoV3YA9wGGng6mbZ0E=" crossorigin="anonymous" />
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
                
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAddMitra">
                    Tambah Mitra
                  </button>
            </div>
    
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
        
        <script src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"></script>

        <script src="{{ url('') }}/vendor/datatables/buttons.server-side.js"></script>
        
        <script src="{{ asset('') }}assets/plugins/toastr/toastr.min.js"></script>
        <script src="{{ asset('') }}assets/plugins/datatables/jquery.dataTables.js"></script>
        <script src="{{ asset('') }}assets/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
        <script src="{{ asset('') }}assets/plugins/datatables-responsive/js/dataTables.responsive.js"></script>
        <script src="{{ asset('') }}assets/plugins/datatables-responsive/js/responsive.bootstrap4.js"></script>
        <script src="{{ asset('') }}assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
        <script src="{{ asset('') }}assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.js"></script>
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

        let data=[];

        const table = $("#my-table").DataTable({
          "responsive": true, 
          "autoWidth": false,
          "pageLength": 5,
          "lengthMenu": [[5, 10, 25, 50, 100], [5, 10, 25, 50, 100]],
          "bLengthChange": true,
          "bFilter": true,
          "bInfo": true,
          "processing":true,
          "bServerSide": true,
          // "order": [[1, "asc" ]],
          "ajax" : {
            url : "{{ url('')}}/activitylist",
            type : "POST",
            data : function(d) {
              d._token = "{{ csrf_token() }}";
            }
          },
          columns :
          [
            {
              "render" : function (data, type, row, meta){
                return row.id
              }
            },
            {
              "render" : function (data, type, row, meta){
                return row.mitra.name
              }
            },
            {
              "render" : function (data, type, row, meta){
                return row.job.name
              }
            },
            {
              "render" : function (data, type, row, meta){
                return row.division.name
              }
            },
            {
              "render" : function (data, type, row, meta){
                return row.waktu
              }
            },
            {
              "render" : function (data, type, row, meta){
                return row.kualitas
              }
            },
            {
              "render" : function (data, type, row, meta){
                return row.sikap
              }
            },
            {
              "render" : function (data, type, row, meta){
                return row.ipk
              }
            },
          ]
        });
    </script>
@endpush