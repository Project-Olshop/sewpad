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
                    <h3 class="text-primary">Data Komentar</h3> </div> 
            </div>

    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <table class="table table-striped" id="example">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Komentar</th>
                            <th>Tutorial</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 0; ?>
                        <?php foreach($komentar as $item) { ?>
						<?php
							$tutorial = $this->db->where('idTutorial', $item['idTutorial']);	
							$tutorial = $this->db->get('tutorial');
							$result = $tutorial->result_array();
						?>
                        <tr>
                            <td><?php echo ++$i; ?></td>
                            <td><?php echo $item['isiKomentar']; ?></td>
                            <td><?php echo $result[0]['nama_tutorial']; ?></td>
                            <td><?php echo $item['tanggalKomentar']; ?></td>
                            <td>
							    <button class="btn btn-danger" type="button" onclick="deleteKomentar('<?php echo $item['idKomentar']; ?>')">Hapus</button>
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

        deleteKomentar = function(idKomentar) {
            var confirmation = confirm('Apakah Anda yakin ingin menghapus komentar ini?');

            if(confirmation) {
                document.location.href = '<?php echo base_url(); ?>DataKomentar/delete/' + idKomentar;
            } else {
                // No aksi
            }
        }
      });
    </script>

</body>

</html>