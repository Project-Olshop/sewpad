
   <div class="container-fluid" style="background-color:  #f89751; padding-top: 100px;padding-bottom: 20px">
          <br><br>
          <div class="row">
            <div class="col-12">
              <div class="card" style="background-color: #f89751;padding-top: 10px; padding-left: 10px;box-shadow: 0 0px 0px rgba(0, 0, 0, 0);">
              <h2 class="text-white">Personal Settings&nbsp;</h2></div>
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
      <!-- left column -->
      <div class="col-md-3">
        <div style="border: 1px solid #c2c4c6; padding-left: 20px; padding-right: 20px; padding-top: 20px; padding-bottom: 20px;">
        <div class="text-center">
        <?php echo form_open_multipart('MemberDetail/updatePhoto'); ?>
          <img src="<?php echo base_url();?>assets/img/<?php echo $username[0]->photo?>" class="avatar img-circle" alt="avatar" width="150" height="150">
          <h6>Upload a different photo...</h6>
          <input type="file" class="form-control" name="photo">
          <br>
          <input type="submit" name="submit" class="btn btn-info" value="Update">
        <?php echo form_close();?>
      </div>
        </div>
      </div>

      
      <!-- edit form column -->
      <div class="col-md-9 personal-info">
      <div style="border: 1px solid #c2c4c6; padding-left: 20px; padding-right: 20px; padding-top: 20px">
        <h3>Personal info</h3>
        <hr>
        <?php echo form_open_multipart('MemberDetail/update'); ?>
          <div class="form-group">
            <label class="col-lg-3 control-label">Username:</label>
            <div class="col-lg-8">
              <input class="form-control" name="username" type="text" value="<?php echo $username[0]->username?>">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Email :</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" name="email" value="<?php echo $username[0]->email?>">
            </div>
          </div>

          <div class="form-group">
            <div class="col-md-8">
              <input type="submit" class="btn btn-primary" value="Save Changes">
            </div>
          </div>
        <?php echo form_close();?>
      </div>
      <br><br>
      <div style="border: 1px solid #c2c4c6; padding-left: 20px; padding-right: 20px; padding-top: 20px">
        <?php echo form_open_multipart('MemberDetail/updatePass'); ?>
        <h3>Change Password</h3>
        <hr>

          <div class="form-group">
            <label class="col-md-3 control-label">Old Password:</label>
            <div class="col-md-8">
              <input class="form-control" type="password" name="old" placeholder="Old Passwordpersonal">
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-3 control-label">New Password:</label>
            <div class="col-md-8">
              <input class="form-control" type="password" name="password" placeholder="New Password">
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-3 control-label">Confirm Password:</label>
            <div class="col-md-8">
              <input class="form-control" type="password" name="confirm" placeholder="Confirm Password">
            </div>
          </div>

          <div class="form-group">
            <div class="col-md-8">
              <input type="submit" class="btn btn-primary" value="Save Changes">
            </div>
          </div>

        <?php echo form_close();?>
      </div>
      <br><br>
      <div style="border: 1px solid #c2c4c6; padding-left: 20px; padding-right: 20px; padding-top: 20px">
        <h3>My Tutorial</h3>
        <hr>
        <table id="example" class="table">
          <thead>
            <tr>
              <th>#</th>
              <th>Judul Tutorial</th>
              <th>Kategori</th>
              <th>Foto</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 0; ?>
            <?php foreach($tutorials as $item) { ?>
            <tr>
              <td><?php echo ++$i; ?></td>
              <td><?php echo $item['nama_tutorial']; ?></td>
              <td><?php echo $item['kategori']; ?></td>
              <td><img src="<?php echo base_url(); ?>assets/img/<?php echo $item['photo_hasil']; ?>" alt="" width="100"></td>
              <td>
                <a href="<?php echo base_url(); ?>tutorial/edit/<?php echo $item['idTutorial']; ?>">
                  <button type="button" class="btn btn-success btn-sm">Edit</button>
                </a>
                <button type="button" class="btn btn-danger btn-sm" onclick="deleteMyTutorial('<?php echo $item['idTutorial']; ?>')">Hapus</button>
              </td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
			</div>

  <br>
  <br>