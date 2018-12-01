<?php $this->load->view('layouts/base_start_member') ?>
<div class="container-fluid" style="background-color:  #f89751; padding-top: 100px;padding-bottom: 20px">
          <br><br>
          <div class="row">
            <div class="col-12">
              <div class="card" style="background-color: #f89751;padding-top: 10px; padding-left: 10px;box-shadow: 0 0px 0px rgba(0, 0, 0, 0);">
              <h2 class="text-white">Detil Tutorial&nbsp;</h2></div>
                </div>
              </div>
            </div>
          </div>

<section id="body">
  <div class="container-fluid" style="padding: 0 0 150px 0; color: black">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card mb-3">
          <img id="blah" class="card-img-top" src="<?php echo base_url(); ?>assets/img/<?php echo $tutorial->photo_hasil; ?>" alt="">
          <div class="card-body">
            <h4><?php echo $tutorial->nama_tutorial; ?></php></h4>
            <h6 class="text-muted"><?php echo $tutorial->kategori; ?></h6>
            <hr>
            <?php if(count($step) > 0) { ?>
            <?php foreach($step as $item) { ?>
            <p><?php echo $item['step']; ?></p>
            <img src="<?php echo base_url(); ?>assets/img/<?php echo $item['photo']; ?>" alt="" width="100%">
            <br> 
            <br> 
            <?php } ?>
            <?php } ?>
          </div>
          <div class="card-footer"><?php echo "Ditulis oleh " . $tutorial->username; ?></div>
        </div>

        <div class="card">
          <div class="card-header bg-dark text-white">
            <strong><?php echo count($komentar) . " Komentar"; ?></strong>
          </div>
          <div class="card-body">
            <?php echo form_open('tutorial/post_comment'); ?>
            <input type="hidden" name="idTutorial" value="<?php echo $tutorial->idTutorial; ?>">
            <?php if(!$this->session->has_userdata('logged_in')) { ?>
            <div class="form-group">
              <label for="namaPengunjung">Nama Lengkap</label>
              <input type="text" name="namaPengunjung" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="emailPengunjung">Email</label>
              <input type="email" name="emailPengunjung" class="form-control" required>
            </div>
            <?php } ?>
            <div class="form-group">
              <label for="isiKomentar">Komentar</label>
              <textarea name="isiKomentar" class="form-control" rows="5" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary btn-sm">Kirim</button>
            </form>
          </div>
          <ul class="list-group list-group-flush">
            <?php if(count($komentar) > 0) { ?>
            <?php foreach($komentar as $item) { ?>
            <li class="list-group-item">
              <h6 class="text-primary" style="line-height: 0;margin-bottom: 0;"><?php echo $item['namaPengunjung']; ?></h6>
              <small class="text-muted"><?php echo date('M d, Y H:i:s', strtotime($item['tanggalKomentar'])); ?></small>
              <p class="text-justify mt-3" style="font-size: 14px;"><?php echo $item['isiKomentar']; ?></p>
            </li>
            <?php } ?>
            <?php } else { ?>
            <li class="list-group-item">
              <p class="text-justify mt-3" style="font-size: 14px;">Belum ada komentar.</p>
            </li>
            <?php } ?>
          </ul>
        </div>
<br/>
<a href="<?php echo base_url(); ?>tutorial/download/<?php echo $tutorial->idTutorial; ?>" class="btn btn-success btn-sm">Download</a>
      </div>
    </div>
  </div>

  <?php $this->load->view('tutorial/layouts/base_end') ?>>