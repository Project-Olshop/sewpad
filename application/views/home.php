<?php $this->load->view('layouts/base_start') ?>
    <header class="masthead text-center text-white d-flex">
      <div class="container my-auto">
        <div class="row">
          <div class="col-lg-10 mx-auto">
            <h1 class="text-uppercase">
              <strong>Making Clothes Easier</strong>
            </h1>
            <hr>
          </div>
          <div class="col-lg-8 mx-auto">
            <p class="text-faded mb-5"></p>
            <a class="btn btn-primary btn-xl js-scroll-trigger" href="#tutorial">Find Out More</a>
          </div>
        </div>
      </div>
    </header>

    <!-- <section class="bg-primary" id="tutorial"> -->
     <link rel="stylesheet" href="<?php echo base_url('assets/css/animate.css');?>">
    <!-- Icomoon Icon Fonts-->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/icomoon.css');?>">
    <!-- Bootstrap  -->
    <!-- <link rel="stylesheet" href="css/bootstrap.css"> -->
    <!-- Magnific Popup -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/magnific-popup.css');?>">
    <!-- Superfish -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/superfish.css');?>">

    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css');?>">

    <script src="js/modernizr-2.6.2.min.js"></script>
    <section id="tutorial">
    <div id="fh5co-blog-section">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading">Tutorial Menjahit</h2>
            <hr class="my-4">
          </div>
        </div>
      </div>
      <?php if (isset($tutorial)) { ?>
      <?php $number = 1; foreach($tutorial as $row) { ?>
      <div class="container">
        <div class="row row-bottom-padded-md">
          <div class="col-lg-4 col-md-4">
            <div class="fh5co-blog animate-box">
            <a href="<?php echo site_url('tutorial/show/'.$row->id) ?>">
              <?php echo $number++ ?>
            </a>
            <a href="<?php echo site_url('tutorial/show/'.$row->id) ?>">
              <img src="<?php echo base_url('assets/upload/')?><?php echo $row->foto_tutorial; ?>" width="100">
            </a>
              <div class="blog-text">
                <div class="prod-title">
                  <h3><a href="<?php echo base_url('/tutorial/show'.$row->id);?>"><?php echo $row->nama_tutorial; ?>45 Minimal Worksspace Rooms for Web Savvys</a></h3>
                  <span class="posted_by">Sep. 15th</span>
                  <span class="comment"><a href="<?php echo base_url('/tutorial/show'.$row->id);?>">21<i class="icon-bubble2"></i></a></span>
                  <a href="<?php echo base_url('/tutorial/show'.$row->id);?>" class="btn btn-primary">Read More</a>
                </div>
              </div> 
            </div>
          </div>
      </div>
      <?php } ?>
      <?php echo $links ?>
      <?php } else { ?>
        <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading">Tidak ada data</h2>
          </div>
        </div>
      </div>
      <?php } ?>
    </div>
    </section>
<?php $this->load->view('layouts/base_end') ?>