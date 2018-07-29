<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <title>Admin | SewPad</title>
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url();?>assets/awal/css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo base_url();?>assets/awal/css/lib/calendar2/semantic.ui.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/awal/css/lib/calendar2/pignose.calendar.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/customz.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/awal/css/lib/owl.carousel.min.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>assets/awal/css/lib/owl.theme.default.min.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>assets/awal/css/helper.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/awal/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/datatable/datatables.min.css">
    <script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/datatable/datatables.min.js"></script>

    
    
</head>
<body class="fix-header fix-sidebar">
<div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Data User</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Data User</li>
                    </ol>
                </div>
            </div>

	<div class="container-fluid">

		<div class="card">
            <div class="card-body">
           		<div class="form-group text-right">
					<button data-toggle="modal" data-target="#tambah-data" class="btn btn-warning"><span class="fa fa-plus"></span> Add</button>
				</div>
                <div class="table-responsive">

		<hr>
  		<!-- <a href="<?php echo site_url()?>/produk/create"><button type="button" class="btn btn-warning"><span class="glyphicon glyphicon-plus"></span>&nbsp;Create </button></a> -->
  		<hr>
  		<td>
  		<?php echo form_open('DataUser/index'); ?>
		<!-- <div class="form-group">
			<th><input type="text" id='search' name='search' class="form-control" placeholder="Search"></th>
		<button type="submit" class="btn btn-default">Submit</button> -->
		<?php echo form_close(); ?>
		</td>

		<?php if (isset($results)) { ?>
		<table class="table" id="example">
			<thead>
				<th>ID User</th>
				<th>Username</th>
				<th>Email</th>
				<th>Company</th>
				<th>Foto User</th>
				<th>Opsi</th>
			</thead>
			<tbody>
			<?php foreach ($results as $data) { ?>
			<tr>
				<td><?php echo $data->id ?></td>
				<td><?php echo $data->username ?></td>
				<td><?php echo $data->email ?></td>
				<td><?php echo $data->company ?></td>
				<td><img src="<?php echo base_url()?>assets/img/upload/<?php echo $data->photo ?>" width="100"></td>

				<td>
					<button type="button" class="btn btn-info" onclick="openModalUpdate('<?php echo $data->username; ?>','<?php echo $data->email; ?>', '<?php echo $data->company; ?>')">
						<span class="fa fa-edit">&nbsp;Update </span></button>
					<a href="<?php echo site_url()?>/DataUser/delete/<?php echo $data->id; ?>" class="btn btn-danger" 
						onclick="return confirm('Are you sure to delete this data permanently?'); ">
						<span class="fa fa-trash"></span>&nbsp;Delete</a>
				</td>

			</tr>
			<?php } ?>
    		</tbody>
  		</table>
		<?php echo $links ?>
		<?php } else { ?>
		<div>Tidak ada data</div>
		<?php } ?>
	</div>

	<!-- User Tambah -->
	<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="tambah-data" class="modal fade-in">
	    <div class="modal-dialog">
	        <div class="modal-content">
	            <div class="modal-header">
	                <h4 class="modal-title">Add Data User</h4>
	            </div>
	            <?php echo form_open_multipart('DataUser/create'); ?>
		            <div class="modal-body">
		            	<div class="container-fluid">
		                    <div class="form-group">
		                        <label class="col-lg-4 col-sm-4 control-label">Username</label>
		                        <div class="col-lg-12">
		                            <input type="text" class="form-control" name="username" placeholder="Masukkan username" required>
		                        </div>
		                    </div>
		                    <div class="form-group">
		                        <label class="col-lg-4 col-sm-4 control-label">Email</label>
		                        <div class="col-lg-12">
		                        	<textarea class="form-control" name="email" placeholder="Masukkan email" required></textarea>
		                        </div>
		                    </div>
							<div class="form-group">
		                        <label class="col-lg-4 col-sm-4 control-label">Company</label>
		                        <div class="col-lg-12">
		                        	<select name="company" class="form-control">
										<option value="Admin">Admin</option>
										<option value="Member">Member</option>
									</select>
		                        </div>
		                    </div>
		                    <div class="form-group">
		                        <label class="col-lg-4 col-sm-4 control-label">Foto</label>
		                        <div class="col-lg-12">
								<input type="file" class="form-control" name="photo">
		                        </div>
		                    </div>
		                </div>
		            </div>
		                <div class="modal-footer">
		                    <button class="btn btn-info" type="submit"> Save&nbsp;</button>
		                    <button type="button" class="btn btn-warning" data-dismiss="modal"> Cancel</button>
		                </div>     
	            	</div>
	            <?php echo form_close();?>
	        </div>
	    </div>
	</div>
	<!-- END User Tambah -->

	<!-- User Ubah -->
	<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="edit-data" class="modal fade-in">
	    <div class="modal-dialog">
	        <div class="modal-content">
	            <div class="modal-header">
	                <h4 class="modal-title">Update Data User</h4>
	            </div>
	             <?php echo form_open_multipart('DataUser/update'); ?>
		            <div class="modal-body">
						<div class="container-fluid">
		                    <div class="form-group">
		                        <label class="col-lg-4 col-sm-4 control-label">Username</label>
		                        <div class="col-lg-12">
									<input type="hidden" id="id" name="id">
		                            <input type="text" class="form-control" id="editUsername" name="username" placeholder="Masukkan username" required readonly>
		                        </div>
		                    </div>
		                    <div class="form-group">
		                        <label class="col-lg-4 col-sm-4 control-label">Email</label>
		                        <div class="col-lg-12">
		                        	<textarea class="form-control" name="email" id="editEmail" placeholder="Masukkan email" required></textarea>
		                        </div>
		                    </div>
							<div class="form-group">
		                        <label class="col-lg-4 col-sm-4 control-label">Company</label>
		                        <div class="col-lg-12">
		                        	<select name="company" class="form-control">
										<option id="editAdmin" value="Admin">Admin</option>
										<option id="editMember" value="Member">Member</option>
									</select>
		                        </div>
		                    </div>
		                    <div class="form-group">
		                        <label class="col-lg-4 col-sm-4 control-label">Foto</label>
		                        <div class="col-lg-12">
		                            <input type="file" class="form-control" name="photo" required>
		                        </div>
		                    </div>
		                </div>
		                <div class="modal-footer">
		                    <button class="btn btn-info" type="submit"> Save&nbsp;</button>
		                    <button type="button" class="btn btn-warning" data-dismiss="modal"> Cancel</button>
		                </div>
	                <?php echo form_close();?>
	            </div>
	        </div>
	    </div>
	</div>

	
    <!-- Bootstrap tether Core JavaScript -->

   <script src="<?php echo base_url();?>assets/awal/js/lib/bootstrap/js/popper.min.js"></script>
    <script src="<?php echo base_url();?>assets/awal/js/lib/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="<?php echo base_url();?>assets/awal/js/jquery.slimscroll.js"></script>
    <!--Menu sidebar -->
    <script src="<?php echo base_url();?>assets/awal/js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="<?php echo base_url();?>assets/awal/js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <!--Custom JavaScript -->

    <script src="<?php echo base_url();?>assets/awal/js/scripts.js"></script>
    <!-- scripit init-->

    <script src="<?php echo base_url();?>assets/awal/js/custom.min.js"></script>

<script type="text/javascript">
      $(document).ready(function() {
        $('#example').DataTable();

		openModalUpdate = function(username, email, company) {
			$('#edit-data').modal('show');
			$('#editUsername').val(username);
			$('#editEmail').val(email);

			if(company == 'Admin' || company == 'admin') {
				$('#editAdmin').attr('selected', 'selected');
			} else {
				$('#editMember').attr('selected', 'selected');
			}
		}
      });
    </script>

</body>
</html>