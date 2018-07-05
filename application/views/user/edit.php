<?php $this->load->view('layouts/base_start') ?>

<div class="container">
  <legend>Tambah Data Pegawai</legend>
  <div class="col-xs-12 col-sm-12 col-md-12">
  <?php echo form_open('pegawai/update/'.$data->id); ?>
    <?php echo form_hidden('id', $data->id) ?>
    <div class="form-group">
      <label for="Nama">Nama</label>
      <input type="text" class="form-control" id="nama" name="nama" 
      placeholder="Masukkan Nama" value="<?php echo $data->nama ?>">
    </div>

    <a class="btn btn-info" href="<?php echo site_url('pegawai/') ?>">Kembali</a>
    <button type="submit" class="btn btn-primary">OK</button>
  <?php echo form_close(); ?>
  </div>
</div>

<?php $this->load->view('layouts/base_end') ?>
