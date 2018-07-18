      <!-- Navigation -->
      <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
        <div class="container">
        <div class="row align-items-center justify-content-between d-flex">
          <a class="navbar-brand js-scroll-trigger" href="<?php echo base_url() ?>">Sewpad</a>
          <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
            <nav id="nav-menu-container">
				        <ul class="nav-menu">
              <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="<?php echo base_url('tutorial');?>">Tutorial</a>
              </li>
              <li class="nav-item"><a href="">
                <?php if(empty($username)){ ?>
                  <a href="<?php echo site_url('/Login');?>">Login</a>
                  <a href="<?php echo site_url('/Register');?>">Register</a>
                <?php }else{?>
                  <span class="fa fa-user"></span>&nbsp;<?php echo $username;?>
                  <a href="<?php echo site_url('/Logout');?>">Logout</a></a>
                <?php } ?>
              </li>
            </ul>
          </div>
        </div>
      </nav>