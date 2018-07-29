
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
                    <h3 class="text-primary">Data Tutorial</h3> </div> 
            </div>

    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <table class="table table-striped" id="example">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Tutorial</th>
                            <th>Kategori</th>
                            <th>Penulis</th>
                            <th>Hasil</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 0; ?>
                        <?php foreach($tutorial as $item) { ?>
						<?php
							$steps = $this->db->where('tutorial_id', $item['idTutorial']);	
							$steps = $this->db->get('step');
							$result = $steps->result_array();

							$content = "";

                            if(count($result) > 0) {
                                foreach($result as $step) {
                                    $content .= "<p>" . $step['step'] . "</p>";
                                }
                            } else {
                                $content .= "<p>Tidak ada step.</p>";
                            }
						?>
                        <tr>
                            <td><?php echo ++$i; ?></td>
                            <td><?php echo $item['nama_tutorial']; ?></td>
                            <td><?php echo $item['kategori']; ?></td>
                            <td><?php echo $item['username']; ?></td>
                            <td><img src="<?php echo base_url('assets/img/'.$item['photo_hasil'])?>" alt="" width="100"></td>
                            <td>
							<button class="btn btn-primary" type="button" onclick="openModalTutorial('<?php echo $content; ?>')">Lihat</button>
                                <button class="btn btn-danger" type="button" onclick="deleteTutorial('<?php echo $item['idTutorial']; ?>')">Hapus</button>
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

	<!-- Modal Tutorial -->
    <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="modalTutorial" class="modal fade-in">
	    <div class="modal-dialog">
	        <div class="modal-content">
	            <div class="modal-header">
	                <h4 class="modal-title">Data Tutorial</h4>
	            </div>
				<div class="modal-body" id="stepTutorial"></div>
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

        deleteTutorial = function(idTutorial) {
            var confirmation = confirm('Apakah Anda yakin ingin menghapus tutorial ini?');

            if(confirmation) {
                document.location.href = '<?php echo base_url(); ?>DataTutorial/delete/' + idTutorial;
            } else {
                // No aksi
            }
        }

		openModalTutorial = function(content) {
			$('#modalTutorial').modal('show');
			document.getElementById('stepTutorial').innerHTML = content;
		}
      });
    </script>

</body>

</html>