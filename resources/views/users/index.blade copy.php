@extends('layouts.layout')

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
        <!-- MULAI TOMBOL TAMBAH -->
    <a href="javascript:void(0)" class="btn btn-info" id="tombol-tambah">Tambah PEGAWAI</a>
    <br><br>
    {{-- {{$dataTable->table()}} --}}
    <table class="table table-bordered" id="my-table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Jenis Kelamin</th>
                <th>Email</th>
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

    <!-- MULAI MODAL FORM TAMBAH/EDIT-->
   
    <!-- AKHIR MODAL -->
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    
  </div>
  <div class="modal fade" id="tambah-edit-modal" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-judul"></h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form id="form-tambah-edit" name="form-tambah-edit" class="form-horizontal">
                    <div class="row">
                        <div class="col-sm-12">

                            <input type="hidden" name="id" id="id">

                            <div class="form-group">
                                <label for="name" class="col-sm-12 control-label">Nama Mitra</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="name" name="name"
                                        value="" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="name" class="col-sm-12 control-label">Jenis Kelamin</label>
                                <div class="col-sm-12">
                                    <select name="gender" id="gender" class="form-control required">
                                        <option value="">Pilih Jenis Kelamin</option>
                                        <option value="Laki-laki">Laki-laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="name" class="col-sm-12 control-label">E-mail</label>
                                <div class="col-sm-12">
                                    <input type="email" class="form-control" id="email" name="email" value=""
                                        required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="name" class="col-sm-12 control-label">Alamat</label>
                                <div class="col-sm-12">
                                    <textarea class="form-control" name="alamat" id="alamat" required></textarea>
                                </div>
                            </div>

                        </div>

                        <div class="col-sm-offset-2 col-sm-12">
                            <button type="submit" class="btn btn-primary btn-block" id="tombol-simpan"
                                value="create">Simpan
                            </button>
                        </div>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
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
        $('#tombol-tambah').click(function () {
            $('#button-simpan').val("create-post"); //valuenya menjadi create-post
            $('#id').val(''); //valuenya menjadi kosong
            $('#form-tambah-edit').trigger("reset"); //mereset semua input dll didalamnya
            $('#modal-judul').html("Tambah Mitra Baru"); //valuenya tambah pegawai baru
            $('#tambah-edit-modal').modal('show'); //modal tampil
        });

        $(document).ready(function(){
            $('#my-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('user.index') }}',
                columns: [
                {data: 'id', name: 'id'},
                {data: 'name', name: 'name'},
                {data: 'gender', name: 'gender'},
                {data: 'email', name: 'email'},
                {data: 'action', name: 'action'},
               ]
            });
            // alert('BERHASIL')
        });

        //SIMPAN & UPDATE DATA DAN VALIDASI (SISI CLIENT)
        //jika id = form-tambah-edit panjangnya lebih dari 0 atau bisa dibilang terdapat data dalam form tersebut maka
        //jalankan jquery validator terhadap setiap inputan dll dan eksekusi script ajax untuk simpan data
        if ($("#form-tambah-edit").length > 0) {
            $("#form-tambah-edit").validate({
                submitHandler: function (form) {
                    var actionType = $('#tombol-simpan').val();
                    $('#tombol-simpan').html('Sending..');
                    $.ajax({
                        data: $('#form-tambah-edit')
                            .serialize(), //function yang dipakai agar value pada form-control seperti input, textarea, select dll dapat digunakan pada URL query string ketika melakukan ajax request
                        url: "{{ route('user.store') }}", //url simpan data
                        type: "POST", //karena simpan kita pakai method POST
                        dataType: 'json', //data tipe kita kirim berupa JSON
                        success: function (data) { //jika berhasil 
                            $('#form-tambah-edit').trigger("reset"); //form reset
                            $('#tambah-edit-modal').modal('hide'); //modal hide
                            $('#tombol-simpan').html('Simpan'); //tombol simpan
                            var oTable = $('#my-table').dataTable(); //inialisasi datatable
                            oTable.fnDraw(false); //reset datatable
                            iziToast.success({ //tampilkan iziToast dengan notif data berhasil disimpan pada posisi kanan bawah
                                title: 'Data Berhasil Disimpan',
                                message: '{{ Session('
                                success ')}}',
                                position: 'bottomRight'
                            });
                        },
                        error: function (data) { //jika error tampilkan error pada console
                            console.log('Error:', data);
                            $('#tombol-simpan').html('Simpan');
                        }
                    });
                }
            })
        }
    </script>
@endpush