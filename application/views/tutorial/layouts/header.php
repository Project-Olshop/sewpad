      <!-- Navigation -->
      <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
        <div class="container">
          <a class="navbar-brand js-scroll-trigger" href="<?php echo base_url() ?>">Sewpad</a>
          <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="<?php echo base_url('tutorial') ?>">Tutorial</a>
              </li>
              <?php if($username){ ?>
                  <li class="nav-item"><a class="nav-link js-scroll-trigger" href="<?php echo base_url('MemberDetail') ?>"><span class="fa fa-user"></span>&nbsp;<?php echo $username;?></a></li>
                  <li class="nav-item"><a class="nav-link js-scroll-trigger" href="<?php echo base_url('Login/Logout');?>">Logout</a></li>
              <?php }?>
              <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="<?php echo site_url('tutorial/create') ?>"><span class="glyphicon glyphicon-pencil"></span>Tulis Tutorial</a>
              </li>           
            </ul>
          </div>
        </div>
      </nav>
