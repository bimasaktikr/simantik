@extends('layouts.app')

@push('page-css')
    {{-- DATATABLES --}}
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.1/css/jquery.dataTables.css">
    
    <link rel="stylesheet" href="{{ asset('') }}assets/plugins/toastr/toastr.min.css">

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
            DAFTAR MITRA
        </div>
        
        <div class="card-body">
            {{-- <button class="btn btn-primary" id="btnAddMitra" onclick="showModal">tambah mitra</button> --}}
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAddMitra">
                Tambah Mitra
              </button>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalImportMitra">
                Import Mitra
              </button>
              
            <div class="dropdown-divider"></div>
             {{-- {{$dataTable->table()}} --}}
            <table class="table table-bordered" id="my-table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Jenis Kelamin</th>
                        <th>Alamat</th>
                        <th>Email</th>
                        <th>Waktu</th>
                        <th>Kualitas</th>
                        <th>Sikap</th>
                        <th>IPK</th>
                        <th>Action</th>
                        {{-- <th>Created At</th> --}}
                        {{-- <th>Updated At</th> --}}
                    </tr>
                </thead>
                <tbody>
                    {{-- @foreach ($users as $user)
                    <tr>
                        <th>{{ $user->id }}</th>
                        <th>{{ $user->name }}</th>
                        <th>{{ $user->email }}</th>
                    </tr>
                    @endforeach --}}
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

  <!-- Modal -->
<div class="modal fade" id="modalAddMitra" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="modalAddMitraLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalAddMitraLabel">Form Tambah Mitra</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form id="formAddMitra">
                <div class="form-group">
                  <label for="name">Nama</label>
                  <input type="text" class="form-control" id="name" name="name">
                </div>
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input name="email" type="email" class="form-control" id="email" aria-describedby="emailHelp">
                  </div>
                <div class="form-group">
                  <label for="alamat">Alamat</label>
                  <input name="alamat"type="text" class="form-control" id="alamat">
                </div>
                <div class="form-group">
                  <label for="jeniskelamin">Jenis Kelamin</label>
                    <select class="custom-select" id="gender" name="gender">
                        <option value="Laki-Laki">Laki-Laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                  </div>
                
                  <div class="form-group">
                    <label for="pendidikan">Pendidikan</label>
                    <input type="text" class="form-control" id="pendidikan" name="pendidikan">
                  </div>
                  <div class="form-group">
                    {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
                    <button type="submit"class="btn btn-primary">Tambahkan</button>
                    {{-- <button type="submit" class="btn btn-primary">Submit</button> --}}
                  </div>
              </form>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="modalImportMitra" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="modalImportMitraLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalAddMitraLabel">Form Import Mitra</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="/importmitra" method="post" id="formImportMitra" enctype="multipart/form-data">
              @csrf
              <div class="form-group">
                <input type="file" name="importFile" id="importFile">    
              </div>
              <div class="form-group">
                <button type="submit"class="btn btn-primary">Tambahkan</button>
              </div>
            </form>
        </div>
      </div>
    </div>
  </div>
  
@endsection

@push('library-js')
 <!-- LIBARARY JS -->
<script src="{{ asset('') }}assets/plugins/toastr/toastr.min.js"></script>
 
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

        $table = $(document).ready(function(){
            $('#my-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('mitra.index') }}',
                columns: [
                {data: 'id', name: 'id'},
                {data: 'name', name: 'name'},
                {data: 'gender', name: 'gender'},
                {data: 'alamat', name: 'alamat'},
                {data: 'email', name: 'email'},
                {data: 'waktu', name: 'waktu'},
                {data: 'kualitas', name: 'kualitas'},
                {data: 'sikap', name: 'sikap'},
                {data: 'ipk', name: 'ipk'},
                {data: 'action', name: 'action'},
               ]
            });
            // alert('BERHASIL')
        });
        
        
       
        $("#formAddMitra").on('submit', function(e){
            event.preventDefault();
            submitForm();
        })
       
        function submitForm(){
            let form = $("#formAddMitra");
            const url = "{{ url('') }}/addmitra";
            $.ajax({
                url,
                method: "POST",
                data : form.serialize(),
                success : function (response){
                    $table
                    toastr.success("Data Berhasil Disimpan")       
                    form.trigger("reset")       
                },
                error:function(err){
                    console.log(err)
                    alert ("ada kesalahan")
                }
            })
        }
    </script>
@endpush