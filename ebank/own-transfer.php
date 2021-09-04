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
          <h1 class="h3 mb-4 text-gray-800">Send funds to yourself</h1>
          <?php include 'inc/balances.php'; ?>    
          <div class="row">
              <div class="col-lg-12">
                  <form class=" quickly-form" name="quickly-form">
                      <div class="card content-box-large">
                          <div class="card-header">
                              <div class="card-title">
                                <strong>Source Account</strong>
                              </div>
                          </div>
                          <div class="card-body">
                              <div class="form-group">
                                  <label class="col col-form-label"> Account Number</label>
                                  <div class="col-md-5">
                                      <select class="form-control">
                                        <option value="Checking Account">Checking Account</option>
                                        <option value="eTrade Account">eTrade Account</option>
                                        <option value="Crypto Trade">Crypto Trade</option>
                                        <option value="Cards">Cards</option>
                                      </select>                                  </div>
                              </div>
                              <input type="hidden" name="is_verified" value="true">
                          </div>
                      </div>
                      <div class="card content-box-large mt-5">
                          <div class="card-header">
                              <div class="card-title">
                                <strong>Destination Account</strong>
                              </div>
                          </div>
                          <div class="card-body">
                              <div class="form-group">
                                  <label class="col col-form-label"> Account Number</label>
                                  <div class="col-md-5">
                                    
                                      <select class="form-control">
                                        <option value="Checking Account">Checking Account</option>
                                        <option value="eTrade Account">eTrade Account</option>
                                        <option value="Crypto Trade">Crypto Trade</option>
                                        <option value="Cards">Cards</option>
                                      </select>
                                  </div>
                              </div>
                              <input type="hidden" name="is_verified" value="true">
                          </div>
                      </div>
                      <div class="card content-box-large mt-5">
                          <div class="card-header">
                              <div class="card-title"><strong>Transaction Details</strong>
                              </div>
                          </div>
                          <div class="card-body">
                              <div class="form-group">
                                  <label class="col-md-2 col-form-label">Amount</label>
                                  <div class="col-md-3">
                                      <input type="number" class="form-control transaction-amount" name="transaction-amount">
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label class="col col-form-label">Enter One-time PIN</label>
                                  <div class="col-md-3">
                                      <input type="number" class="form-control" name="otp">
                                  </div>
                                  <div class="help-text">Sent to you phone.</div>
                              </div>
                          </div>
                          <div class="form-group">
                              <div class="offset-sm-2 col-md-10">
                                  <button type="button" class="btn btn-primary btn-sm send-request-tf" disabled>Confirm</button>
                              </div>
                          </div>
                      </div>
                  </form>
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


