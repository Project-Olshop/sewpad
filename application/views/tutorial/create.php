<?php $this->load->view('tutorial/layouts/base_start') ?>

<div class="container">
  <legend>Tulis Tutorial</legend>
  <div class="col-xs-12 col-sm-12 col-md-12">
  <?php echo form_open('tutorial/store'); ?>

    <div class="form-group">
      <label for="nama_tutorial">Judul Tutorial</label>
      <input type="text" class="form-control" id="nama_tutorial" name="nama_tutorial" placeholder="Masukkan Judul">
    </div>

    <div class="form-group">
    <label for="foto_tutorial">Foto</label>
    <input type="file" id="foto_tutorial" name="foto_tutorial">
  </div>

    <a class="btn btn-info" href="<?php echo site_url('tutorial/') ?>">Kembali</a>
    <button type="submit" class="btn btn-primary">OK</button>
  <?php echo form_close() ?>
  </div>
</div>

<?php $this->load->view('tutorial/layouts/base_end') ?>
