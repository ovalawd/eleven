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
                <h3>Send money to other AndBank Account</h3>
          <div class="row">
            <div class="col-md-12">
                <form class="form-horizontal quickly-form" name="quickly-form">
                  <div class="content-box-large">
                    <div class="panel-heading">
                      <div class="panel-title"><strong>Beneficiary Customer</strong></div>
                    </div>
                    <div class="panel-body">

                      <div class="form-group">
                        <label class="col control-label">AndBank Account Number</label>
                        <div class="col-sm-5">
                          <input type="text" class="form-control ben-cust-name" name="ben-cust-name" placeholder="eg. 330 000 1234" >
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Mobile Number</label>
                        <div class="col-sm-5">
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
                        <div class="col-sm-3">
                          <input type="number" class="form-control transaction-amount" name="transaction-amount">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col control-label">Enter One-time PIN</label>
                        <div class="col-sm-3">
                          <input type="number" class="form-control" name="otp">
                        </div>
                      </div>
                    </div>
                      <div class="form-group">

                        <div class="col-sm-offset-2 col-sm-10">
                          <button type="button" class="btn btn-primary btn-sm send-request-tf" disabled>
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


<script type="text/javascript">


  $(document).on('click', '.send-request-tf', function (e){
    e.preventDefault();
    $('.modal').modal('show');
    var em  = $('#emailinput').val();
    var mp = $('#mobilenoinput').val();
    var bname = $('.ben-b-name').val();
    var cust = $('.ben-cust-name').val();
    var tranamount = $('.transaction-amount').val();
    var trandesc = $('.transaction-desc').val();
    var code = _.random(1111, 9999);
    var mobileNo = $('#mobilenoinput').val();
    var userInputElements = $('form.quickly-form .form-control');

    setTimeout(function () {

      $.ajax({
        url: 'process-transfer.php',
        method: 'POST',
        async: false,
        data:userInputElements.serialize(),
        success: function (data) {
          alert('This transaction has been submitted. You will get a confirmation message soon. Thank you');
          console.log(data);
          $('.modal').modal('hide');
          var windowObjectReference;

          var strWindowFeatures = "menubar=no,location=no,resizable=yes,scrollbars=yes,status=no";

          function openRequestedPopup(url) {
            windowObjectReference = window.open(url, "Transaction Receipt", strWindowFeatures);
          }


          var recipt = '<?php echo $host; ?>/transaction-receipt.php?ben-cust-name=' + cust+ '&transaction-amount=' + tranamount;

          openRequestedPopup(recipt);

          $('.send-request-tf').text('Transfer Done').prop('disabled', 'disabled');
        }
      });
    }, 1000)
  });
</script>

  </body>
</html>