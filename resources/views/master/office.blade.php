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
            Satuan Kerja
        </div>
        
        <div class="card-body">
            <div class="row">
                
                
            </div>
    
            <table class="table table-bordered" id="my-table"> 
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nama</th>
                        <th>Kode</th>
                        <th>Alamat</th>
                        <th>Action</th>
                    </tr>
                </thead>
                @foreach ($offices as $office)
                <tbody>
                  
                  <tr>
                    <td>{{ $office -> id }}</td>
                    <td>{{ $office -> name }}</td>
                    <td>{{ $office -> code }}</td>
                    <td>{{ $office -> address }}</td>
                    
                    <td>
                        <div class="btn-group">
                          <button type="button" class="btn btn-success btn-flat" data-toggle="modal" data-target="#modal-default">
                            <i class="fas fa-edit" aria-hidden="true"></i>
                          </button>
                          <button type="button" class="btn btn-success btn-flat" id="userCreate">
                            <i class="fas fa-user-circle"></i>
                          </button>
                        </div>
                    </td>
                  </tr>
                  
                </tbody>
                @endforeach

            </table>
        </div>
    </div>
    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Default Modal</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form id="form">
                    <div class="form-group">
                      <label for="name">Satuan kerja</label>
                      <input name = "name" type="text" class="form-control" id="name" aria-describedby="emailHelp">
                    </div>
                    <div class="form-group">
                      <label for="code">Kode Satker</label>
                      <input name = "code" type="text" class="form-control" id="code" aria-describedby="emailHelp">
                    </div>
                    <div class="form-group">
                      <label for="address">Alamat</label>
                      <input name = "address" type="text" class="form-control" id="address">
                    </div>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </form>
            </div>
            <div class="modal-footer justify-content-between">
              
            </div>
          </div>
      
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
       
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

        <script src="/vendor/datatables/buttons.server-side.js"></script>

<script src="{{ asset('') }}assets/plugins/toastr/toastr.min.js"></script>

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

        // AMBIL FDATA
      let data=[];

     

      $("#form").on("submit", function (e){
          event.preventDefault()
          submitForm()
      })

      function submitForm(){
            let form = $("#form");
            const url = "{{ url('') }}/editoffice";
            $.ajax({
                url,
                method: "POST",
                data : form.serialize(),
                success : function (response){
                    // console.log(data)
                    toastr.success(response)       
                    form.trigger("reset") 
                    window.location.reload();

                },
                error:function(err){
                    console.log(err)
                    alert ("ada kesalahan")
                }
            })
        }

        $("#userCreate").on('click', function (){
          $.ajax({
            url : "{{ url('') }}/userseeder",
            method : "GET",
            sucess : function (){
              alert ("User Berhasil Ditambakan")
            },
            error : function (err){
              console.log(err)
              alert ("Error")
            }
          })
        })
    </script>
@endpush