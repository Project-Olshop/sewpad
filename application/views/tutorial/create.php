
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
        <?php echo form_open_multipart('Tutorial/create'); ?>
          <div class="form-group">
            <label class="col-lg-3 control-label">Judul :</label>
            <div class="col-lg-8">
              <input class="form-control" id="nama_tutorial" name="nama_tutorial" type="text" placeholder="Judul">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Kategori :</label>
            <div class="col-lg-8">
            <select class="form-control" name="kat_id">
							<option  value="">Pilih Kategori</option>                   
            	<?php foreach($kat_list as $row) { ?>
            <option value="<?php echo $row->idKat;?>"><?php echo $row->kategori;?></option>
            <?php } ?>
						</select>
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Foto :</label>
            <div class="col-lg-8">
            <input class="form-control" id="photo_hasil" type="file" name="photo_hasil">
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-8">
              <input type="submit" class="btn btn-primary" value="Submit">
            </div>
          </div>
        <?php echo form_close();?>
      </div>
      <br><br>
    </div>
  </div>
			</div>

  <br>
  <br>
  <?php $this->load->view('layouts/base_end') ?>