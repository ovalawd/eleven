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
                  <form class="form-horizontal quickly-form" name="confirm-form" method="POST" action="process-transfer.php">
                    <div class="content-box-large">
                      <div class="panel-heading">
                        <div class="panel-title"><strong>Source of Funds</strong></div>
                      </div>
                      <div class="panel-body">

                        <div class="form-group">
                          <label class="col-sm-2 control-label">Bank Name</label>
                          <div class="col-sm-8">
                            <input readonly type="text" class="form-control ben-b-name" name="s-b-name" value="<?php echo $_POST['s-b-name']; ?>">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-2 control-label">Location</label>
                          <div class="col-sm-8">
                            <input readonly type="text" class="form-control" name="s-b-address" value="<?php echo $_POST['s-b-address']; ?>">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-2 control-label">SWIFT/BIC</label>
                          <div class="col-sm-4">
                            <input readonly type="text" class="form-control" name="s-b-swiftbic" value="<?php echo $_POST['s-b-swiftbic']; ?>">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-2 control-label">ABA/RTN</label>
                          <div class="col-sm-8">
                            <input readonly type="text" class="form-control" name="s-b-aba" value="<?php echo $_POST['s-b-aba']; ?>">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-2 control-label">Account Name</label>
                          <div class="col-sm-4">
                            <input readonly type="text" class="form-control" name="s-s-name" value="<?php echo $_POST['s-s-name']; ?>">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-2 control-label">Account Number</label>
                          <div class="col-sm-4">
                            <input readonly type="text" class="form-control" name="s-s-acno" value="<?php echo $_POST['s-s-acno']; ?>">
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
                          <label class="col control-label">AndBank Account Number</label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" name="ben-cust-ac-no" value="<?php echo $_POST['ben-cust-ac-no']; ?>" readonly>
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="col control-label">AndBank Account Name</label>
                          <div class="col-sm-8">
                            <input style="color: blue" type="text" class="form-control ben-cust-name" name="ben-cust-name" value="<?php echo $benCustName; ?>" readonly>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-2 control-label">Mobile Number</label>
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
                          <label class="col-sm-2 control-label">Amount</label>
                          <div class="col-sm-8">
                            <input type="number" class="form-control transaction-amount" name="transaction-amount" value="<?php echo $_POST['transaction-amount']; ?>" readonly>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-2 control-label">Ref. Message</label>
                          <div class="col-sm-8">
                            <textarea type="text" class="form-control" name="message" value="<?php echo $_POST['message']; ?>" readonly></textarea>
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