
   <div class="container-fluid" style="background-color:  #f89751; padding-top: 100px;padding-bottom: 20px">
          <br><br>
          <div class="row">
            <div class="col-12">
              <div class="card" style="background-color: #f89751;padding-top: 10px; padding-left: 10px;box-shadow: 0 0px 0px rgba(0, 0, 0, 0);">
              <h2 class="text-white">Tulis Tutorial&nbsp;</h2></div>
                </div>
              </div>
            </div>
          </div>

<br>
        <?php if(!empty(validation_errors())){ ?>
        <div class="alert alert-info alert-dismissable">
          <a class="panel-close close" data-dismiss="alert">×</a> 
          <?php echo validation_errors(); ?>
        </div>
          <?php }?>

<section id="body">
  <div class="container-fluid" style="padding-top: 20px; color: black">
 
    <div class="row">
      
      <!-- edit form column -->
      <div class="col-md-5 personal-info">
      <div style="border: 1px solid #c2c4c6; padding-left: 20px; padding-right: 20px; padding-top: 20px">
        <h3>Tutorial</h3>
        <hr>
        
      </div>
      <br><br>
      <div style="border: 1px solid #c2c4c6; padding-left: 20px; padding-right: 20px; padding-top: 20px">
      <?php echo form_open_multipart('Tutorial/createStep'); ?>
        <h3>Langkah - Langkah</h3>
        <hr>
        <?php $number = 1; ?>

          <div class="form-group">
            <label class="col-md-3 control-label">Step<?php echo $number++ ?> :</label>
            <div class="col-md-8">
              <input class="form-control" type="text" name="step" placeholder="Tulis Langkah">
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-3 control-label">Masukkan Foto:</label>
            <div class="col-md-8">
              <input class="form-control" type="file" name="photo" placeholder="Masukkan Foto">
            </div>
          </div>
        
          <div class="form-group">
            <div class="col-md-8">
              <input type="submit" class="btn btn-primary" value="Simpan">
            </div>
          </div>

        <?php echo form_close();?>
      </div>
    </div>
  </div>
			</div>

  <br>
  <br>
  <?php $this->load->view('layouts/base_end') ?>