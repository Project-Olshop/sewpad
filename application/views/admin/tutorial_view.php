<?php $this->load->view('layouts/base_start'); ?>

<div class="container">
  <legend>Data Tutorial</legend>
  <div class="col-xs-12 col-sm-12 col-md-12">
  <?php echo form_open_multipart('tutorial/store'); ?>

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
      <input type="text" class="form-control" id="foto_tutorial" name="foto_tutorial" placeholder="Masukkan Foto">
    </div>

    <a class="btn btn-info" href="<?php echo base_url('tutorial/') ?>">Kembali</a>
    <button type="submit" class="btn btn-primary" href="<?php echo site_url('tutorial/create') ?>">OK</button>
  <?php echo form_close() ?>
  </div>
</div>

<?php $this->load->view('layouts/base_end'); ?>
