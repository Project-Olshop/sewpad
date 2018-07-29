
   <div class="container-fluid" style="background-color:  #f89751; padding-top: 100px;padding-bottom: 20px">
          <br><br>
          <div class="row">
            <div class="col-12">
              <div class="card" style="background-color: #f89751;padding-top: 10px; padding-left: 10px;box-shadow: 0 0px 0px rgba(0, 0, 0, 0);">
              <h2 class="text-white">Edit Tutorial&nbsp;</h2></div>
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
    <!-- Modal Tambah -->
    <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="modalTambahStep" class="modal fade-in">
	    <div class="modal-dialog">
	        <div class="modal-content">
	            <div class="modal-header">
	                <h4 class="modal-title">Add Step</h4>
	            </div>
	            <?php echo form_open_multipart('Tutorial/createStep'); ?>
                    <input type="hidden" name="tutorial_id" value="<?php echo $tutorial[0]['idTutorial']; ?>">
		            <div class="modal-body">
		            	<div class="container-fluid">
		                    <div class="form-group">
		                        <label style="color: #222222;"><strong>Step</strong></label>
		                        <textarea name="step" class="form-control" rows="5" required="required"></textarea>
		                    </div>
                            <div class="form-group">
                                <label style="color: #222222;"><strong>Foto</strong></label>
		                        <input type="file" class="form-control" name="photo" required="required">
		                    </div>
		                </div>
		            </div>
		                <div class="modal-footer">
		                    <button class="btn btn-info" type="submit"> Save&nbsp;</button>
		                    <button type="button" class="btn btn-warning" data-dismiss="modal"> Cancel</button>
		                </div>     
	            	</div>
	            </form>
	        </div>
	    </div>
	</div>
    
  <div class="container-fluid" style="padding: 0 0 150px 0; color: black">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card">
          <img id="blah" class="card-img-top" src="<?php echo base_url(); ?>assets/img/<?php echo $tutorial[0]['photo_hasil']; ?>" alt="">
          <div class="card-body">
            <?php echo form_open_multipart('Tutorial/edit/' . $tutorial[0]['idTutorial']); ?>
              <input type="hidden" name="idTutorial" value="<?php echo $tutorial[0]['idTutorial']; ?>" />
              <div class="form-group">
                <label><strong>Judul Tutorial</strong></label>
                <input type="text" class="form-control" name="nama_tutorial" value="<?php echo $tutorial[0]['nama_tutorial']; ?>">
              </div>

              <div class="form-group">
                <label><strong>Kategori Tutorial</strong></label>
                <select name="kat_id" class="form-control">
                  <option value="" selected="selected">-- Pilih kategori</option>
                  <?php foreach($kategori as $item) { ?>
                  <option value="<?php echo $item['idKat']; ?>" <?php echo ($item['idKat'] == $tutorial[0]['kat_id'] ? 'selected="selected"' : ''); ?>><?php echo $item['kategori']; ?></option>
                  <?php } ?>
                </select>
              </div>

              <div class="form-group" style="display: none;">
                <label><strong>Foto Hasil</strong></label>
                <input id="imgInp" type="file" class="form-control" name="photo_hasil">
              </div>

              <div class="form-group">
                <label><strong>Step by step</strong></label>
                <?php if(count($step) != 0) { ?>
                <table class="table">
                    <tbody>
                        <?php foreach($step as $item) { ?>
                        <?php
                            if(str_word_count($item['step'], 0) > 10) {
                                $words = str_word_count($item['step'], 2);
                                $pos = array_keys($words);
                                $text = substr($item['step'], 0, $pos[10]) . '...';   
                            } else {
                                $text = $item['step'];
                            }
                        ?>
                        
                        <tr>
                            <td><img src="<?php echo base_url(); ?>assets/img/<?php echo ($item['photo'] != '' ? $item['photo'] : 'default-image.png'); ?>" alt="" width="100"></td>
                            <td class="text-left"><?php echo $text; ?></td>
                            <td>
                                <button type="button" class="btn btn-danger btn-sm" onclick="deleteStep('<?php echo $item['idStep']; ?>', '<?php echo $tutorial[0]['idTutorial']; ?>')">Hapus</button>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <?php } else { ?>
                <p>Tidak ada step.</p>
                <?php } ?>
              </div>

              <button type="submit" class="btn btn-primary">Edit</button>
              <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalTambahStep">Tambah Step</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php $this->load->view('layouts/base_end') ?>