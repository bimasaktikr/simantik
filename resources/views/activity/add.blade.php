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
            <div class="" >
                {{-- <form class="" id="jobBatch" autocomplete="off">
                    <div class="form-group col">
                        <label for="job">Kegiatan</label>
                        <input name="job"type="job" class="form-control typeahead" id="job" aria-describedby="job">
                      </div>
                </form> --}}

                <div class="col-12">
                    <label class="visually-hidden" for="pekerjaanSelect">Pekerjaan</label>
                    <select class="form-select" id="pekerjaanSelect">
                        <option>Choose...</option>
                      @foreach ( $jobs as $job )
                          <option value={{ $job -> name }}>{{ $job -> name }}</option>
                      @endforeach
                       
                    </select>
                  </div>
                <form class ="row" id="addBatchItem" autocomplete="off">
                        <div class="col-md-8">
                            <input type="text" placeholder="Ketik Nama Mitra..." class="form-control typeahead" id="name" name="name">
                        </div>
                        <div class="col-md-4">
                            <button class="btn btn-primary" id="addMitraID">Tambah</button>
                        </div>
                </form>
            </div>

            <table class="table table-bordered" id="my-table">
                <thead>
                    <tr>
                        <th>Nama</th>
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
  

   <!-- Modal -->
   
<div class="modal fade " id="modalAddActivity" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="modalAddActivity" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalAddMitraLabel">Form Tambah Activity</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form id="formAddActivity" autocomplete="off">
              <div class="form-group">
                <label for="name">Nama</label>
                <input type="text" class="form-control typeahead" id="name" name="name">
              </div>
              <div class="form-group">
                  <label for="job">Kegiatan</label>
                  <input name="job" type="job" class="form-control typeahead" id="job" aria-describedby="job">
                </div>
              <div class="form-group">
                  <label for="tahun">Tahun Kegiatan</label>
                  <input name="tahun" type="tahun" class="form-control" id="tahun" aria-describedby="tahun">
              </div>
              <div class="form-group d-flex .flex-row justify-content-between">
                <div class="">
                  <label for="waktu">Waktu</label>
                  <input name="waktu" type="waktu" class="form-control" id="waktu" aria-describedby="waktu">
                </div>
                <div class="">
                  <label for="kualitas">kualitas</label>
                  <input name="kualitas" type="kualitas" class="form-control" id="kualitas" aria-describedby="kualitas">
                </div>
                <div class="">
                  <label for="sikap">sikap</label>
                  <input name="sikap" type="sikap" class="form-control" id="sikap" aria-describedby="sikap">
                </div>
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
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.html5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.print.min.js"></script>
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
              
        var table =  $('#my-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                  url : '{{ route('activity.index') }}',
                  method : "POST",
                  data : function (d) {
                    d._token =  "{{csrf_token()}}",
                    d.waktu = $("#waktuFilter").val(),
                    d.kualitas = $("#kualitasFilter").val(),
                    d.sikap = $("#sikapFilter").val(),
                    d.ipk = $("#ipkFilter").val()
                  }
                },
                columns: [
                  { data : 'mitra',
                    "fnCreatedCell": function (nTd, sData, oData, iRow, iCol) {
                        $(nTd).html("<a href='{{ url('') }}/mitra/"+oData.slug+"'>"+oData.mitra+"</a>");
                    }
                  },
                  { data: 'waktu', name: 'waktu'},
                  { data: 'kualitas', name: 'kualitas'},
                  { data: 'sikap', name: 'sikap'},
                  { data: 'ipk', name: 'ipk'}
               ],
            });
        
            var waktu = $("#waktuFilter").val();
            var kualitas = $("#kualitasFilter").val();
            var sikap = $("#sikapFilter").val();
            var ipk= $("#ipkFilter").val();

       
        $('#pekerjaanSelect').change(
            function(){
                var job = $("#pekerjaanSelect").val();
                alert(job);
            }
            
        );
        // AUTOCOMPLETE
        var pathName = "{{ url('')}}/activitysearchname";
        var pathJob = "{{ url('')}}/activitysearchjob";

        $("#name").typeahead({
          source: function(query, process){
            return $.get(pathName, {query:query},function (data){
              return process(data);
            });
          }
        });
        $("#job").typeahead({
          source: function(query, process){
            return $.get(pathJob, {query:query},function (data){
              return process(data);
            });
          }
        });

        // AJAX ADD KEGIATAN
        $("#addMitraID").on('submit', function(){
            
            
        })
       
        function submitForm(){
            let form = $("#formAddActivity");
            const url = "{{ url('') }}/addActivity";
            $.ajax({
                url,
                method: "POST",
                data : form.serialize(),
                success : function (response){
                    table
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