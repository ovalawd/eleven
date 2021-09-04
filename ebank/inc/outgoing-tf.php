<?php
  if (!$_POST['transferMethod']) {
    die('No config available for transfer operation.');    
  }
  if ($_POST['ben-cust-ac-no']) {
    $user = $_POST['ben-cust-ac-no'];
    $query = "SELECT * FROM profile WHERE ac_no = '$user'";
    if (!$result = $db->query($query)) {
      // header('Location:  ' . HOST . '/index.php?msg=Invalid Session&badauth=1');
      die('Invalid Desination Account. The Account Number is not valid. Detecting AndBank');
    }

    if (mysqli_num_rows($result) > 0) {    
      $raar = mysqli_fetch_array($result);
      $benCustName = $raar['firstname']. ' ' . $raar['lastname'];
    }
  }
?>

<div class="col-md-12">
          <div class="row">
            <div class="col-md-12">
              <div class="card shadow mb-4">
                <div class="card-body"> 
                    <form class="form-horizontal" name="outgoing-form" method="POST" action="process-transfer.php">
                      <div class="content-box-large">
                        <div class="panel-heading">
                          <div class="panel-title" style="margin-top: 0"><strong>Beneficiary of Funds</strong></div>
                        </div>
                        <div class="panel-body">

                          <div class="form-group">
                            <label class="col-sm-2 control-label">Bank Name</label>
                            <div class="col-sm-8">
                              <input readonly type="text" class="form-control ben-b-name" name="ben-b-name" value="<?php echo $_POST['ben-b-name']; ?>">
                            </div>
                          </div>
                        <!--  -->
                          <div class="form-group">
                            <label class="col-sm-2 control-label">SWIFT/BIC</label>
                            <div class="col-sm-4">
                              <input readonly type="text" class="form-control" name="ben-b-swiftbic" value="<?php echo $_POST['ben-b-swiftbic']; ?>">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-2 control-label">ABA/RTN</label>
                            <div class="col-sm-8">
                              <input readonly type="text" class="form-control" name="ben-b-aba" value="<?php echo $_POST['ben-b-aba']; ?>">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-2 control-label">Location</label>
                            <div class="col-sm-4">
                              <input readonly type="text" class="form-control" name="ben-b-address" value="<?php echo $_POST['ben-b-address']; ?>">
                            </div>
                          </div>                                            
                        </div>
                      </div>

                      <div class="content-box-large">
                        <div class="panel-heading">
                          <div class="panel-title"><strong>Beneficiary Customer</strong></div>
                        </div>
                        <div class="panel-body">

                          <div class="form-group">
                            <label class="col control-label">Account Number</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control ben-cust-number" name="ben-cust-ac-no" value="<?php echo $_POST['ben-cust-ac-no']; ?>" readonly>
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="col control-label">Account Name</label>
                            <div class="col-sm-8">
                              <input style="color: blue" type="text" class="form-control ben-cust-name" name="ben-cust-name" value="<?php echo $_POST['ben-cust-name']; ?>" readonly>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-4 control-label">Mobile Number</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" name="ben-cust-phone" value="<?php echo $_POST['ben-cust-phone']; ?>" readonly >
                            </div>
                          </div>

                        </div>
                      </div>
                      <div class="content-box-large">
                        <div class="panel-heading">
                          <div class="panel-title"><strong>Transaction Details</strong></div>
                        </div>
                        <div class="panel-body">


                          <div class="form-group">
                            <label class="col-sm-4 control-label">Amount in <?php echo $_POST['transaction-currency']; ?></label>
                            <div class="col-sm-8">
                              <input type="number" class="form-control transaction-amount" name="transaction-amount" value="<?php echo $_POST['transaction-amount']; ?>" readonly>
                            </div>
                          </div>

                        </div>
                          <div class="form-group">
                          <input type="hidden" name="transferMethod" value="<?php echo $_POST['transferMethod']; ?>">
                            <div class="col-sm-offset-2 col-sm-10">
                              <button type="submit" class="btn btn-primary btn-sm">
                                Send Money
                              </button>
                            </div>
                          </div> 


                      </div>

                    </form>              
                </div>
              </div>
            </div>
          </div>
</div>