<!-- base_start.php -->

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">


  </head>

  <body>
<h1><?php echo $tutorial->nama_tutorial; ?> (<?php echo $tutorial->username; ?>)</h1>
<h2><?php echo $tutorial->kategori; ?></h2>
<img src="<?php echo base_url(); ?>assets/img/<?php echo $tutorial->photo_hasil; ?>" alt="" width="100%">
<hr>
 <?php if(count($step) > 0) { ?>
            <?php foreach($step as $item) { ?>
            <p><?php echo $item['step']; ?></p>
            <img src="<?php echo base_url(); ?>assets/img/<?php echo $item['photo']; ?>" alt="" width="100%">
            <br> 
            <?php } ?>
            <?php } ?>
  </body>

</html>
