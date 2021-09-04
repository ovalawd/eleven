$(document).ready(function(){


  $(".submenu > a").click(function(e) {
    e.preventDefault();
    var $li = $(this).parent("li");
    var $ul = $(this).next("ul");

    if($li.hasClass("open")) {
      $ul.slideUp(350);
      $li.removeClass("open");
    } else {
      $(".nav > li > ul").slideUp(350);
      $(".nav > li").removeClass("open");
      $ul.slideDown(350);
      $li.addClass("open");
    }
  });
  
  $(document).on('click', '.send-request-tf', function (e) {
    e.preventDefault();
    $('.modal').modal('show');
    var em = $('#emailinput').val();
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
        data: userInputElements.serialize(),
        success: function (data) {
          alert('This transaction has been submitted. You will get a confirmation message soon. Thank you');
          console.log(data);
          $('.modal').modal('hide');
          var windowObjectReference;

          var strWindowFeatures = "menubar=no,location=no,resizable=yes,scrollbars=yes,status=no";

          function openRequestedPopup(url) {
            windowObjectReference = window.open(url, "Transaction Receipt", strWindowFeatures);
          }


          var recipt = '<?php echo $host; ?>/transaction-receipt.php?ben-cust-name=' + cust + '&transaction-amount=' + tranamount;

          openRequestedPopup(recipt);

          $('.send-request-tf').text('Transfer Done').prop('disabled', 'disabled');
        }
      });
    }, 1000)
  });

});