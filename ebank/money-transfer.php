<?php

  include './boot.php';
  include './inc/tf-query.php';
  $show = true;
  unset($_SESSION['recent_transfer']);
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
          <h1 class="h3 mb-4 text-gray-800">Send Money Transfer</h1>
          <form class=" quickly-form" name="quickly-form" method="POST" action="confirm-transfer.php">  
            <div class="row">          
              <div class="col-md-6">
                    <div class="card content-box-large">
                      
                      <div class="card-header">
                          <div class="card-title"><strong>Beneficiary Bank</strong>
                          </div>
                      </div>
                      <div class="card-body">
                          <div class="form-group">
                              <label class="col-md-3 col-form-label">SWIFT/BIC</label>
                              <div class="col-md-4">
                                  <input type="text" class="form-control" name="ben-b-swiftbic">
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-md-3 col-form-label">Bank Name</label>
                              <div class="col-md-8">
                                  <input type="text" class="form-control ben-b-name" name="ben-b-name">
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-md-3 col-form-label">Location</label>
                              <div class="col-md-8">
                                  <input type="text" class="form-control" name="ben-b-address">
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-md-3 col-form-label">ABA/RTN</label>
                              <div class="col-md-8">
                                  <input type="text" class="form-control" name="ben-b-aba">
                              </div>
                          </div>
                      </div>
                    </div>
                    <div class="card content-box-large mt-5">
                        <div class="card-header">
                            <div class="card-title"><strong>Beneficiary Customer</strong>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label class="col-md-4 col-form-label">Account Number</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="ben-cust-ac-no">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 col-form-label">Account Name</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="ben-cust-name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 col-form-label">Mobile Number</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="ben-cust-phone">
                                </div> <span class="help-text">Receive this transaction details</span>
                            </div>
                            <input type="hidden" name="transferMethod" value="outgoing-funds">
                            <div class="form-group">
                                <div class="offset-sm-2 col-md-10">
                                    <button type="submit" class="btn btn-primary btn-lg">Confirm Transfer</button>
                                </div>
                            </div>
                            <!-- Modal -->
                        </div>
                    </div>  
              </div>
              <div class="col-md-6">


                <div class="card content-box-large">
                    <div class="card-header">
                        <div class="card-title"><strong>Transaction Details</strong>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label class="col-md-3 col-form-label">Amount</label>
                            <div class="col-md-8">
                                <input type="number" class="form-control transaction-amount" name="transaction-amount">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 col-form-label">Currency</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="transaction-currency" value="<?php echo $currency; ?>"
                                readonly="readonly">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 col-form-label">Ref. Message</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="message">
                            </div>
                        </div>
                    </div>
                </div>                              
              </div>
            </div>
          </form>
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
