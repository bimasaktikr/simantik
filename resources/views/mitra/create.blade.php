<form class="formAddMitra">
    <div class="form-group">
      <label for="inputNama">Nama</label>
      <input type="text" class="form-control" id="inputNama" aria-describedby="emailHelp">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
      </div>
    <div class="form-group">
      <label for="inputAlamat">Alamat</label>
      <input type="text" class="form-control" id="inputAlamat">
    </div>
    <select class="custom-select">
        <option selected>Jenis Kelamin</option>
        <option value="1">Laki-Laki</option>
        <option value="2">Perempuan</option>
      </select>
      <div class="form-group">
        <label for="inputAlamat">Pendidikan</label>
        <input type="text" class="form-control" id="inputAlamat">
      </div>
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        {{-- <button type="button submit" class="btn btn-primary">Tambahkan</button> --}}
      <button type="submit" class="btn btn-primary" onclick="submitForm()">Submit</button>
  </form>