<!-- base_end.php -->
    <?php $this->load->view('layouts/footer'); ?>

    <!-- Bootstrap core JavaScript -->
    <script src="<?php echo base_url('assets/vendor/jquery/jquery.min.js');?>"></script>
    <script src="<?php echo base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js');?>"></script>

    <!-- Plugin JavaScript -->
    <script src="<?php echo base_url('assets/vendor/jquery-easing/jquery.easing.min.js');?>"></script>
    <script src="<?php echo base_url('assets/vendor/scrollreveal/scrollreveal.min.js');?>"></script>
    <script src="<?php echo base_url('assets/vendor/magnific-popup/jquery.magnific-popup.min.js');?>"></script>

    <!-- Custom scripts for this template -->
    <script src="<?php echo base_url('assets/js/creative.min.js');?>"></script>


    <script src="<?php echo base_url('assets/js/jquery.min.js');?>"></script>
  <!-- jQuery Easing -->
   <script src="<?php echo base_url('assets/js/jquery.easing.1.3.js');?>"></script>
  <!-- Bootstrap-->
  <script src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script>
  <!-- Waypoints -->
  <script src="<?php echo base_url('assets/js/jquery.waypoints.min.js');?>"></script>
  <!-- Stellar -->
  <script src="<?php echo base_url('assets/js/jquery.stellar.min.js');?>"></script>
  <!-- Superfish -->
  <script src="<?php echo base_url('assets/js/hoverIntent.js');?>"></script>
  <script src="<?php echo base_url('assets/js/superfish.js');?>"></script>

      <script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/datatable/datatables.min.js"></script>

    <script>
      $(document).ready(function() {
        $('#example').DataTable();
      })
    </script>
 
  <!-- Main JS (Do not remove) -->
  <script src="<?php echo base_url('assets/js/main.js');?>"></script>
  <script>
    $(document).ready(function() {
      function readURL(input) {

        if (input.files && input.files[0]) {
          var reader = new FileReader();

          reader.onload = function(e) {
            $('#blah').attr('src', e.target.result);
          }

          reader.readAsDataURL(input.files[0]);
        }
      }

      $("#imgInp").change(function() {
        readURL(this);
      });

      $('#blah').on('click', (function() {
        $('#imgInp').click();
      }))

      deleteStep = function(idStep, idTutorial) {
        var confirmation = confirm('Apakah Anda yakin ingin menghapus step ini?');

        if(confirmation) {
          document.location.href = '<?php echo base_url(); ?>tutorial/deleteStep/' + idStep + '/' + idTutorial;
        } else {
          // No aksi
        }
      }

      deleteMyTutorial = function(idTutorial) {
        var confirmation = confirm('Apakah Anda yakin ingin menghapus tutorial ini?');

        if(confirmation) {
          document.location.href = '<?php echo base_url(); ?>tutorial/deleteTutorial/' + idTutorial;
        } else {
          // No aksi
        }
      }
    })
  </script>
  </body>

</html>
