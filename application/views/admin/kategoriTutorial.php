
<html lang="en">

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
    <link href="<?php echo base_url();?>assets/awal/css/helper.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/awal/css/style.css" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="<?php echo base_url()?>assets/jsgrid/jsgrid.min.css" />
    <link type="text/css" rel="stylesheet" href="<?php echo base_url()?>assets/jsgrid/jsgrid-theme.min.css" />
    <script src="<?php echo base_url()?>assets/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/jsgrid/jsgrid.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/custom/grid.js"></script>
    <link href="<?php echo base_url();?>assets/css/customz.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/datatable/datatables.min.css">
    <script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/datatable/datatables.min.js"></script>

</head>
<body class="fix-header fix-sidebar">
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Kategori Tutorial</h3> </div> 
            </div>

    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <button type="button" class="btn btn-primary" onclick="openModalTambahKategori()">Tambah</button>
                <table class="table table-striped" id="example">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Kategori</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 0; ?>
                        <?php foreach($kategori as $item) { ?>
                        <tr>
                            <td><?php echo ++$i; ?></td>
                            <td><?php echo $item['kategori']; ?></td>
                            <td>
                                <button class="btn btn-success" type="button" onclick="openModalEditKategori('<?php echo $item['idKat']; ?>', '<?php echo $item['kategori']; ?>', '<?php echo $item['deskripsi']; ?>')">Edit</button>
                                <button class="btn btn-danger" type="button" onclick="deleteKategori('<?php echo $item['idKat']; ?>')">Hapus</button>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
            <!-- End Container fluid  -->
            <!-- footer -->
            <footer class="footer"> © 2018 Template designed by SewPad | Hidayati - Triska</a></footer>
            <!-- End footer -->
        </div>
        <!-- End Page wrapper  -->
    </div>

    <!-- Modal Tambah -->
    <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="modalTambahKategori" class="modal fade-in">
	    <div class="modal-dialog">
	        <div class="modal-content">
	            <div class="modal-header">
	                <h4 class="modal-title">Add Data Kategori</h4>
	            </div>
	            <?php echo form_open('KategoriTutorial/create'); ?>
		            <div class="modal-body">
		            	<div class="container-fluid">
		                    <div class="form-group">
		                        <label class="col-lg-4 col-sm-4 control-label">Kategori</label>
		                        <div class="col-lg-12">
		                            <input type="text" class="form-control" name="kategori" required>
		                        </div>
		                    </div>
                            <div class="form-group">
		                        <label class="col-lg-4 col-sm-4 control-label">Deskripsi</label>
		                        <div class="col-lg-12">
                                    <textarea name="deskripsi" style="height: 150px;" class="form-control" required="required"></textarea>
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

    <!-- Modal Edit -->
    <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="modalEditKategori" class="modal fade-in">
	    <div class="modal-dialog">
	        <div class="modal-content">
	            <div class="modal-header">
	                <h4 class="modal-title">Edit Data Kategori</h4>
	            </div>
	            <?php echo form_open('KategoriTutorial/update'); ?>
                    <input type="hidden" name="idKat" id="editIdKat" value="">
		            <div class="modal-body">
		            	<div class="container-fluid">
		                    <div class="form-group">
		                        <label class="col-lg-4 col-sm-4 control-label">Kategori</label>
		                        <div class="col-lg-12">
		                            <input type="text" class="form-control" id="editKategori" value="" name="kategori" required>
		                        </div>
		                    </div>
                            <div class="form-group">
		                        <label class="col-lg-4 col-sm-4 control-label">Deskripsi</label>
		                        <div class="col-lg-12">
                                    <textarea name="deskripsi" style="height: 150px;" class="form-control" required="required" id="editDeskripsi"></textarea>
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

    <!-- End Wrapper -->
    <!-- All Jquery -->
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

        openModalTambahKategori = function() {
            $('#modalTambahKategori').modal('show');
        }

        openModalEditKategori = function(idKat, kategori, deskripsi) {
            $('#modalEditKategori').modal('show');

            $('#editIdKat').val(idKat);
            $('#editKategori').val(kategori);
            $('#editDeskripsi').val(deskripsi);
        }

        deleteKategori = function(idKat) {
            var confirmation = confirm('Apakah Anda yakin ingin menghapus kategori ini?');

            if(confirmation) {
                document.location.href = '<?php echo base_url(); ?>KategoriTutorial/delete/' + idKat;
            } else {
                // No aksi
            }
        }
      });
    </script>

</body>

</html>