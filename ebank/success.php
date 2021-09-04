<?php

  include './boot.php';
  include './inc/tf-query.php';
  $show = true;
  if(!isset($_SESSION['recent_transfer'])) {
    header('Location:  ' . HOST . '/index.php?msg=Transfer Already Queued');
  }

  $tfAmount = intval(json_decode($_SESSION["recent_transfer"], true)["transaction-amount"]);
  $receiptData = http_build_query(json_decode($_SESSION["recent_transfer"], true));
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
          <div class="row">
      <div class="col-md-8 col-lg-6 col-xl-5 mx-auto">
        <!-- Send Money Success
        ============================================= -->
        <div class="bg-light shadow-sm rounded p-3 p-sm-4 mb-4">
        <div class="text-center my-5">
        <p class="text-center text-success text-20 line-height-07"><i class="fas fa-check-circle"></i></p>
        <p class="text-center text-success text-8 line-height-07">Success!</p>
        <p class="text-center text-4">Transactions Complete</p>
        </div>
        <p class="text-center text-3 mb-4">You've Succesfully sent <span class="text-4 font-weight-500"><?php echo money_format('%i', (int)$tfAmount); ?></span>. Check <span class="font-weight-500"><?php echo $email; ?></span> to see transaction receipt. See more details under <a href="transfers.php">Activity</a>.</p>
          <a href="money-transfer.php" class="btn btn-primary btn-block">Send Money Again</a>
          <a href="transaction-receipt.php?<?php echo $receiptData; ?>"class="btn btn-link btn-block" target="_blank"><i class="fas fa-print"></i> Print</a> 
        </div>
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






