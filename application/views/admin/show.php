<?php $this->load->view('layouts/base_start') ?>

<div class="container">
  <legend>Lihat Tutorial</legend>
  <div class="content">
    <div class="form-group">
      <label for="nama">Nama</label>
      <p><?php echo $data->nama_tutorial ?></p>
    </div>
    <div class="form-group">
      <label for="deskripsi">Deskripsi</label>
      <p><?php echo $data->deskripsi ?></p>
    </div>
    <div class="form-group">
      <label for="foto_tutorial">Foto</label>
      <p><?php echo $data->foto_tutorial ?></p>
    </div>
    <a class="btn btn-info" href="<?php echo base_url('tutorial/') ?>">Kembali</a>
  </div>
</div>

<?php $this->load->view('layouts/base_end') ?>
