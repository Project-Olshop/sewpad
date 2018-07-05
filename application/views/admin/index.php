<?php $this->load->view('layouts/base_start') ?>

<div class="container">
  <legend>Daftar Tutorial</legend>
  <div class="col-xs-12 col-sm-12 col-md-12">
    <table class="table table-striped">
      <thead>
        <th>No</th>
        <th>Nama</th>
        <th>Deskripsi</th>
        <th>Foto</th>
        <th>
          <a class="btn btn-primary" href="<?php echo site_url('tutorial/create') ?>">
            Tambah
          </a>
        </th>
      </thead>
      <tbody>
        <?php $number = 1; foreach($tutorial as $row) { ?>
        <tr>
          <td>
            <a href="<?php echo base_url('tutorial/show/'.$row->id) ?>">
              <?php echo $number++ ?>
            </a>
          </td>
          <td>
            <a href="<?php echo base_url('tutorial/show/'.$row->id) ?>">
              <?php echo $row->nama_tutorial ?>
            </a>
          </td>
          <td>
            <a href="<?php echo base_url('tutorial/show/'.$row->id) ?>">
              <?php echo $row->deskripsi ?>
            </a>
          </td>
          <td>
            <a href="<?php echo base_url('tutorial/show/'.$row->id) ?>">
              <?php echo $row->foto_tutorial ?>
            </a>

          </td>
          <td>
          <a href='<?php echo site_url('images_examples/simple_photo_gallery')?>'>Simple Photo Gallery</a>
            <a href='<?php echo site_url('images_examples/simple_photo_gallery')?>'>Simple Photo Gallery</a>
          </td>
          <td>
            <?php echo form_open_multipart('tutorial/destroy/'.$row->id)  ?>
            <a class="btn btn-info" href="<?php echo base_url('pegawai/edit/'.$row->id) ?>">
              Ubah
            </a>
            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin?')">Hapus</button>
            <?php echo form_close() ?>
          </td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</div>

<?php $this->load->view('layouts/base_end') ?>

