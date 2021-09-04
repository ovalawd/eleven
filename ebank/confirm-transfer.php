
<?php

  include './boot.php';
  include './inc/tf-query.php';
  $show = true;
?>
<!DOCTYPE html>
<html lang="en">

<?php include 'inc/head.php'; ?>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <?php include 'inc/side-bar.php'; ?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <?php include 'inc/menu.php'; ?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Confirm Transfer</h1>
          <div class="col-md-8">
            <div class="row">        
              <?php
                // echo "<pre>";
                // var_dump($_SESSION);
                // var_dump($_POST);
                // echo "</pre>";
                if ($_POST['transferMethod'] === 'incoming-funds') {
                  include './inc/incoming-tf.php';
                }
                if ($_POST['transferMethod'] === 'outgoing-funds') {
                  include './inc/outgoing-tf.php';
                }
              ?>
            </div>
          </div> 
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Alons Private Banking 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->


  <?php include 'inc/scripts.php'; ?>

</body>

</html>



