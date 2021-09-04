<?php

  include './boot.php';
  include './inc/tf-query.php';
  $show = true;
  $records = $raar;
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
        
        <!-- Left Panel
        ============================================= -->
        <aside class="col-lg-3"> 
          
          
          <!-- Available Balance
          =============================== -->
          <div class="bg-light shadow-sm rounded text-center p-3 mb-4">
            <div class="text-17 text-light my-3"><i class="fas fa-wallet"></i></div>
            <h3 class="text-9 font-weight-400">$<?php printBalance(); ?></h3>
            <p class="mb-2 text-muted opacity-8">Available Balance</p>
            <hr class="mx-n3">
          </div>
          <!-- Available Balance End --> 
          
          <!-- Need Help?
          =============================== -->
          <div class="bg-light shadow-sm rounded text-center p-3 mb-4">
            <div class="text-17 text-light my-3"><i class="fas fa-comments"></i></div>
            <h3 class="text-3 font-weight-400 my-4">Need Help?</h3>
            <p class="text-muted opacity-8 mb-4">Have questions or concerns regrading your account?<br>
              Our experts are here to help!.</p>
            <a href="https://tawk.to/630eb38bbdc5e89cea70b51c9495ade67501f55f" class="btn btn-primary btn-block">Chat with Us</a> </div>
          <!-- Need Help? End -->
          
        </aside>
        <!-- Left Panel End -->
        
        <!-- Middle Panel
        ============================================= -->
        <div class="col-lg-9">
          
          <h2 class="font-weight-400 mb-3">Transactions</h2>
          
          <!-- Filter
          ============================================= -->
          <div class="row">
            <div class="col mb-2">
              <form id="filterTransactions" method="post">
                <div class="form-row">
                  <!-- Date Range
                  ========================= -->
                  <div class="col-sm-6 col-md-5 form-group">
                    <input id="dateRange" type="text" class="form-control" placeholder="Date Range">
                    <span class="icon-inside"><i class="fas fa-calendar-alt"></i></span> 
                  </div>
                  <!-- All Filters Link
                  ========================= -->
                  <div class="col-auto d-flex align-items-center mr-auto form-group" data-toggle="collapse"> <a class="btn-link" data-toggle="collapse" href="#allFilters" aria-expanded="false" aria-controls="allFilters">All Filters<i class="fas fa-sliders-h text-3 ml-1"></i></a> </div>
                  <!-- Statements Link
                  ========================= -->
                  <div class="col-auto d-flex align-items-center ml-auto form-group">
                    <div class="dropdown"> <a class="text-muted btn-link" href="#" role="button" id="statements" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-file-download text-3 mr-1"></i>Statements</a>
                      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="statements"> <a class="dropdown-item" href="#">CSV</a> <a class="dropdown-item" href="#">PDF</a> </div>
                    </div>
                  </div>
                  
                  <!-- All Filters collapse
                  ================================ -->
                  <div class="col-12 collapse mb-3" id="allFilters">
                    <div class="custom-control custom-radio custom-control-inline">
                      <input type="radio" id="allTransactions" name="allFilters" class="custom-control-input" checked="">
                      <label class="custom-control-label" for="allTransactions">All Transactions</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                      <input type="radio" id="paymentsSend" name="allFilters" class="custom-control-input">
                      <label class="custom-control-label" for="paymentsSend">Payments Send</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                      <input type="radio" id="paymentsReceived" name="allFilters" class="custom-control-input">
                      <label class="custom-control-label" for="paymentsReceived">Payments Received</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                      <input type="radio" id="refunds" name="allFilters" class="custom-control-input">
                      <label class="custom-control-label" for="refunds">Refunds</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                      <input type="radio" id="withdrawal" name="allFilters" class="custom-control-input">
                      <label class="custom-control-label" for="withdrawal">Withdrawal</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                      <input type="radio" id="deposit" name="allFilters" class="custom-control-input">
                      <label class="custom-control-label" for="deposit">Deposit</label>
                    </div>
                  </div>
                  <!-- All Filters collapse End -->
                </div>
              </form>
            </div>
          </div>
          <!-- Filter End -->
          
          <!-- All Transactions
          ============================================= -->
          <div class="bg-light shadow-sm rounded py-4 mb-4">
            <h3 class="text-5 font-weight-400 d-flex align-items-center px-4 mb-3">All Transactions</h3>
            <!-- Title
            =============================== -->
            <div class="transaction-title py-2 px-4">
              <div class="row">
                <div class="col-2 col-sm-1 text-center"><span class="">Date</span></div>
                <div class="col col-sm-7">Description</div>
                <div class="col-auto col-sm-2 d-none d-sm-block text-center">Status</div>
                <div class="col-3 col-sm-2 text-right">Amount</div>
              </div>
            </div>
            <!-- Title End -->
            
            <!-- Transaction List
            =============================== -->
            <div class="transaction-list">
              <?php 

                foreach ($records as $key => $record) {
                  # code...
                  $transactionDetails = json_decode($record['trnx_desc'], true);
                
                  // echo "<pre>";
                  //   var_dump($transactionDetails);
                  // echo "</echo>";
              ?>
                  <div class="transaction-item px-4 py-3">
                    <div class="row align-items-center flex-row">
                      <div class="col-2 col-sm-1 text-center">  
                        <span class="d-block text-1 font-weight-300 text-uppercase">
                          <?php echo $record["transaction_date"]; ?></span> </div>
                      <div class="col col-sm-7"> <span class="d-block text-4"><?php echo $transactionDetails['ben-b-name']; ?></span> <span class="text-muted">Transfer to Bank account <?php echo $transactionDetails['ben-cust-name']; ?></span> </div>
                      <div class="col-auto col-sm-2 d-none d-sm-block text-center text-3"> 
                        <span class="text-success" data-toggle="tooltip" data-original-title="Completed"><i class="fas fa-check-circle"></i></span> 
                      </div>
                      <div class="col-3 col-sm-2 text-right text-4"> <span class="text-nowrap">
                        - <?php
                            echo number_format(intval($transactionDetails['transaction-amount']));
                          ?>
                      </span> <span class="text-2 text-uppercase">(USD)</span> </div>
                    </div>
                  </div>
              <?php
                }
              ?>
            </div>
            <!-- Transaction List End -->
            
            <!-- Transaction Item Details Modal
            =========================================== -->
            <div id="transaction-detail" class="modal fade" role="dialog" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered transaction-details" role="document">
                <div class="modal-content">
                  <div class="modal-body">
                    <div class="row no-gutters">
                      <div class="col-sm-5 d-flex justify-content-center bg-primary rounded-left py-4">
                        <div class="my-auto text-center">
                          <div class="text-17 text-white my-3"><i class="fas fa-building"></i></div>
                          <h3 class="text-4 text-white font-weight-400 my-3">Envato Pty Ltd</h3>
                          <div class="text-8 font-weight-500 text-white my-4">$557.20</div>
                          <p class="text-white">15 March 2019</p>
                        </div>
                      </div>
                      <div class="col-sm-7">
                        <h5 class="text-5 font-weight-400 m-3">Transaction Details
                          <button type="button" class="close font-weight-400" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
                        </h5>
                        <hr>
                        <div class="px-3">
                          <ul class="list-unstyled">
                            <li class="mb-2">Payment Amount <span class="float-right text-3">$562.00</span></li>
                            <li class="mb-2">Fee <span class="float-right text-3">-$4.80</span></li>
                          </ul>
                          <hr class="mb-2">
                          <p class="d-flex align-items-center font-weight-500 mb-4">Total Amount <span class="text-3 ml-auto">$557.20</span></p>
                          <ul class="list-unstyled">
                            <li class="font-weight-500">Paid By:</li>
                            <li class="text-muted">Envato Pty Ltd</li>
                          </ul>
                          <ul class="list-unstyled">
                            <li class="font-weight-500">Transaction ID:</li>
                            <li class="text-muted">26566689645685976589</li>
                          </ul>
                          <ul class="list-unstyled">
                            <li class="font-weight-500">Description:</li>
                            <li class="text-muted">Envato March 2019 Member Payment</li>
                          </ul>
                          <ul class="list-unstyled">
                            <li class="font-weight-500">Status:</li>
                            <li class="text-muted">Completed</li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Transaction Item Details Modal End -->
            
            <!-- Pagination
            ============================================= -->
     
            
          </div>
          <!-- All Transactions End --> 
        </div>
        <!-- Middle End --> 
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


  <?php include 'inc/scripts.php'; ?>

</body>

</html>
