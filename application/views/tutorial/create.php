
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
  <div class="container-fluid" style="padding: 0 0 150px 0; color: black">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card">
          <img id="blah" class="card-img-top" src="<?php echo base_url(); ?>assets/img/default-image.png" alt="">
          <div class="card-body">
            <?php echo form_open_multipart('Tutorial/create'); ?>
              <div class="form-group">
                <label><strong>Judul Tutorial</strong></label>
                <input type="text" class="form-control" name="nama_tutorial">
              </div>

              <div class="form-group">
                <label><strong>Kategori Tutorial</strong></label>
                <select name="kat_id" class="form-control">
                  <option value="" selected="selected">-- Pilih kategori</option>
                  <?php foreach($kategori as $item) { ?>
                  <option value="<?php echo $item['idKat']; ?>"><?php echo $item['kategori']; ?></option>
                  <?php } ?>
                </select>
              </div>

              <div class="form-group" style="display: none;">
                <label><strong>Foto Hasil</strong></label>
                <input id="imgInp" type="file" class="form-control" name="photo_hasil" required="required">
              </div>

              <div class="form-group">
                <label><strong>Step by step</strong></label>
                <p>Simpan terlebih dahulu tutorial ini.</p>
              </div>

              <button type="submit" class="btn btn-primary">Tambah</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php $this->load->view('layouts/base_end') ?>