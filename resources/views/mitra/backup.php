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
            DAFTAR MITRA
        </div>
        
        <div class="card-body">
            <div class="">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAddMitra">
                    Tambah Mitra
                </button>
            </div>
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
            <form class="formAddMitra">
                <div class="form-group">
                  <label for="inputNama">Nama</label>
                  <input type="email" class="form-control" id="inputNama" aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                  </div>
                <div class="form-group">
                  <label for="inputAlamat">Alamat</label>
                  <input type="text" class="form-control" id="inputAlamat">
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="radio1">
                    <label class="form-check-label">Laki-Laki</label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="radio1" checked>
                    <label class="form-check-label">Perempuan</label>
                  </div>
                  <div class="form-group">
                    <label for="inputAlamat">Pendidikan</label>
                    <input type="text" class="form-control" id="inputAlamat">
                  </div>
              </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          {{-- <button type="button submit" class="btn btn-primary">Tambahkan</button> --}}
          <button type="submit" class="btn btn-primary">Submit</button>

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

        $(document).ready(function(){
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
        
            
            //SIMPAN & UPDATE DATA DAN VALIDASI (SISI CLIENT)
            //jika id = form-tambah-edit panjangnya lebih dari 0 atau bisa dibilang terdapat data dalam form tersebut maka
            //jalankan jquery validator terhadap setiap inputan dll dan eksekusi script ajax untuk simpan data
            if ($("#").length > 0) {
                $("#").validate({
                submitHandler: function (form) {
                    var actionType = $('#tombol-simpan').val();
                    $('#tombol-simpan').html('Sending..');
                    $.ajax({
                        data: $('#')
                            .serialize(), //function yang dipakai agar value pada form-control seperti input, textarea, select dll dapat digunakan pada URL query string ketika melakukan ajax request
                        url: "{{ route('mitra.store') }}", //url simpan data
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

        //TOMBOL EDIT DATA PER PEGAWAI DAN TAMPIKAN DATA BERDASARKAN ID PEGAWAI KE MODAL
        //ketika class edit-post yang ada pada tag body di klik maka
        $('body').on('click', '.edit-post', function () {
            var data_id = $(this).data('id');
            // alert(data_id)

            $.get('mitra/' + data_id + '/edit', function (data) {
                $('#modal-judul').html("Edit Post");
                $('#tombol-simpan').val("edit-post");
                $('#tambah-edit-modal').modal('show');
                //set value masing-masing id berdasarkan data yg diperoleh dari ajax get request diatas               
                $('#id').val(data.id);
                $('#name').val(data.name);
                $('#gender').val(data.gender);
                $('#email').val(data.email);
                $('#waktu').val(data.waktu);
                $('#kualitas').val(data.kualitas);
                $('#sikap').val(data.sikap);
                $('#ipk').val(data.ipk);
            })
        });

        $('body').on('click', 'detail-post', function () {
            var data_id = $(this).data('id');
            alert(data_id)
        });

        //jika klik class delete (yang ada pada tombol delete) maka tampilkan modal konfirmasi hapus maka
        $(document).on('click', '.delete', function () {
            dataId = $(this).attr('id');
            $('#konfirmasi-modal').modal('show');
        });
        
        //jika tombol hapus pada modal konfirmasi di klik maka
        $('#tombol-hapus').click(function () {
            $.ajax({
                url: "pegawai/" + dataId, //eksekusi ajax ke url ini
                type: 'delete',
                beforeSend: function () {
                    $('#tombol-hapus').text('Hapus Data'); //set text untuk tombol hapus
                },
                success: function (data) { //jika sukses
                    setTimeout(function () {
                        $('#konfirmasi-modal').modal('hide'); //sembunyikan konfirmasi modal
                        var oTable = $('#table_pegawai').dataTable();
                        oTable.fnDraw(false); //reset datatable
                    });
                    iziToast.warning({ //tampilkan izitoast warning
                        title: 'Data Berhasil Dihapus',
                        message: '{{ Session('
                        delete ')}}',
                        position: 'bottomRight'
                    });
                }
            })
        });
    </script>
@endpush