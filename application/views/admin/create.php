<?php $this->load->view('layouts/base_start') ?>

<div class="container">
  <legend>Tambah Data tutorial</legend>
  <div class="col-xs-12 col-sm-12 col-md-12">
  <?php echo form_open_multipart('tutorial/store') ?>

    <div class="form-group">
      <label for="Nama">Nama</label>
      <input type="text" class="form-control" id="nama_tutorial" name="nama_tutorial" placeholder="Masukkan Nama">
    </div>
    <div class="form-group">
      <label for="Deskripsi">Deskripsi</label>
      <input type="text" class="form-control" id="deskripsi" name="deskripsi" placeholder="Masukkan Deskripsi">
    </div>
    <div class="form-group">
      <label for="Foto">Foto</label>
      <input type="file" id="foto_tutorial" name="foto_tutorial" class="file">
      <!-- <div class="input-group col-xs-12">
        <span class="input-group-addon"><i class="glyphicon glyphicon-picture"></i></span>
        <input type="text" class="form-control input-lg" disabled placeholder="Upload Gambar">
        <span class="input-group-btn">
          <button class="browse btn btn-primary input-lg" type="button"><i class="glyphicon glyphicon-search"></i> Telusuri</button>
        </span> -->
      <!-- </div> --><br>
    </div>
    <a class="btn btn-info" href="<?php echo site_url('tutorial/') ?>">Kembali</a>
    <button type="submit" class="btn btn-primary" >OK</button>
  <?php echo form_close() ?>
  </div>
</div>

<?php $this->load->view('layouts/base_end') ?>
