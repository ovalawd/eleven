<?php
  include './boot.php';
  include './inc/tf-query.php';
?>
<!DOCTYPE html>
<html>
    <head>

    <?php include_once './inc/head.php'; ?>
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/animatecss/3.5.2/animate.min.css">
    <link rel="stylesheet" type="text/css" href="css/morphext.css">
    <script type="text/javascript" src="https://cdn.jsdelivr.net/lodash/4.13.1/lodash.min.js"></script>
  </head>
  <body>
  	<?php include_once './inc/header.php'; ?>
    <div class="page-content">
    	<div class="row">
  		    <div class="col-md-2">
		  	    <?php include_once './inc/nav.php'; ?>
    		</div>
		    <div class="col-md-7">
                <h3>Receive money from other Bank Account</h3>
          <div class="row">
            <div class="col-md-12">
                <form class="form-horizontal quickly-form" name="quickly-form" method="POST" action="confirm-transfer.php">
                  <div class="content-box-large">
                    <div class="panel-heading">
                      <div class="panel-title"><strong>Source of Funds</strong></div>
                    </div>
                    <div class="panel-body">

                      <div class="form-group">
                        <label class="col-sm-2 control-label">Bank Name</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control ben-b-name" name="s-b-name">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Location</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" name="s-b-address">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">SWIFT/BIC</label>
                        <div class="col-sm-4">
                          <input type="text" class="form-control" name="s-b-swiftbic">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">ABA/RTN</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" name="s-b-aba">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Account Name</label>
                        <div class="col-sm-4">
                          <input type="text" class="form-control" name="s-s-name">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Account Number</label>
                        <div class="col-sm-4">
                          <input type="text" class="form-control" name="s-s-acno">
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
                          <input type="text" class="form-control" name="ben-cust-ac-no" placeholder="eg. 330 000 1234" >
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Mobile Number</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" name="ben-cust-phone" placeholder="for transaction confirmation" >
                        </div>
                        <span class="help-text">Receive this transaction confirmation</span>
                      </div>
                      <input type="hidden" name="is_verified" value="true">

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
                          <input type="number" class="form-control transaction-amount" name="transaction-amount">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Ref. Message</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" name="message">
                        </div>
                      </div>
                    </div>
                      <input type="hidden" value="incoming-funds" name="transferMethod">
                      <div class="form-group">

                        <div class="col-sm-offset-2 col-sm-10">
                          <button type="submit" class="btn btn-primary btn-sm ">
                            Confirm
                          </button>
                        </div>
                      </div> 


                  </div>

                </form>              
            </div>
          </div>
		  	</div>
            <?php include_once './inc/sidebar.php'; ?>
      </div>
  	</div>
    <?php include_once './inc/footer.php'; ?>
    <?php include 'modal.php'; ?>

  </body>
</html>