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
        <div class="card">
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
<br/>
<a href="<?php echo base_url(); ?>tutorial/download/<?php echo $tutorial->idTutorial; ?>" class="btn btn-success btn-sm">Download</a>
      </div>
    </div>
  </div>
  <?php $this->load->view('tutorial/layouts/base_end') ?>>