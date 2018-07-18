<?php $this->load->view('layouts/base_start') ?>
    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Sewpad | Login</title>

        <!-- CSS -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>'assets/login/css/bootstrap.css')">
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="<?php echo base_url('assets/login/bootstrap/css/bootstrap.min.css');?>">
        <link rel="stylesheet" href="<?php echo base_url('assets/login/font-awesome/css/font-awesome.min.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/login/css/form-elements.css');?>">
        <link rel="stylesheet" href="<?php echo base_url('assets/login/css/style.css');?>">
        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="<?php echo base_url('assets/login/ico/favicon.png');?>">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo base_url('assets/login/ico/apple-touch-icon-144-precomposed.png');?>">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo base_url('assets/login/ico/apple-touch-icon-114-precomposed.png');?>">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo base_url('assets/login/ico/apple-touch-icon-72-precomposed.png');?>">
        <link rel="apple-touch-icon-precomposed" href="<?php echo base_url('assets/login/ico/apple-touch-icon-57-precomposed.png');?>">

    </head>
    <body>
        <!-- Top content -->
        <div class="top-content">
            
            <div class="inner-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text">
                            <h1><strong>Sewpad</strong> Login</h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4 col-sm-offset-4 form-box">
                            <div class="form-top">
                                <div class="form-top-left">
                                    <h3>Login to our site</h3>
                                    <p>Enter your username and password to log on:</p>
                                </div>
                                <div class="form-top-right">
                                    <i class="fa fa-lock"></i>
                                </div>
                            </div>
                            <div class="form-bottom">
                                <?php echo form_open('login/cekdb'); ?>
                                <?php echo validation_errors()?>
                                <form role="form" action="" method="post" class="login-form">
                                    <div class="form-group">
                                        <label class="sr-only" for="form-username">Username</label>
                                        <input type="text" name="username" placeholder="Username..." class="form-username form-control" id="username">
                                    </div>
                                    <div class="form-group">
                                        <label class="sr-only" for="form-password">Password</label>
                                        <input type="password" name="password" placeholder="Password..." class="form-password form-control" id="password">
                                    </div>
                                    <div>
                                    <label>Belum punya akun <a href="<?php echo site_url("login/register"); ?>"> Registrasi</a>
                                    </label>
                                     
                                    </div>
                                    <button type="submit" class="btn">Sign in!</button>
                                </form>
                                <?php echo form_close(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>



        <!-- Javascript -->
        <script src="<?php echo base_url('assets/login/js/jquery-1.11.1.min.js');?>"></script>
        <script src="<?php echo base_url('assets/login/js/bootstrap/bootstrap.min.js');?>"></script>
        <script src="<?php echo base_url('assets/login/js/jquery.backstretch.min.js');?>"></script>
        <script src="<?php echo base_url('assets/login/js/scripts.js');?>"></script>
        
        <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->

    </body>
<?php $this->load->view('layouts/base_end') ?>