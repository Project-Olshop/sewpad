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
    <title>Ela - Bootstrap Admin Dashboard Template</title>
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
                    <h3 class="text-primary">Schedule Event</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Schedule Event</li>
                    </ol>
                </div>
            </div>

    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover" id="example">
                        <thead>
                            <th>ID Schedule</th>
                            <th>Event Name</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th> </th>
                        </thead>
                        <tbody>
                        <?php foreach ($sche_list as $key) {?>
                        <tr>
                            <td><?php echo $key->idSchedule; ?></td>
                            <td><?php echo $key->name; ?></td>
                            <td><?php echo $key->date; ?></td>
                            <td><?php echo $key->startTime; ?> - <?php echo $key->endTime; ?></td>
                            <td>
                            <a href="<?php echo site_url()?>/EventSchedule/getDataID/<?php echo $key->idSchedule;?>"><button type="button" class="btn btn-primary">&nbsp;Detail</button></a>

                            <a href="<?php echo site_url()?>/EventPrice/byID/<?php echo $key->idSchedule;?>"><button type="button" class="btn btn-primary"><span class="fa fa-search"></span>&nbsp;Price</button></a>

                            <a href="<?php echo site_url()?>/EventSchedule/deleteData/<?php echo $key->idSchedule;?>"><button type="button" class="btn btn-primary" onclick="return confirm('Are you sure to delete this data permanently?');"><span class="fa fa-trash"></span>&nbsp;Delete</button></a>

                            </td>
                        </tr>
                        <?php } ?>
                        </tbody>
                    </table>
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
      });
    </script>

</body>
</html>