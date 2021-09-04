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
          <h1 class="h3 mb-4 text-gray-800">Pay Bills</h1>
          <div class="row">
            <div class="col-md-8 col-lg-6 col-xl-5 mx-auto">
              <div class="bg-light shadow-sm rounded p-3 p-sm-4 mb-4">
                <h3 class="text-5 font-weight-400 mb-3">Payer Details</h3>
                <!-- Request Money Form
                ============================================= -->
                <form id="form-send-money" method="post">
                  <div class="form-group">
                    <label for="payerName">Name</label>
                    <input type="text" value="" class="form-control" data-bv-field="payerName" id="payerName" required="" placeholder="Search Providers" readonly="" value="No bills found">
                  </div>
                  <div class="form-group">
                    <label for="emailID">Email</label>
                    <input type="text" value="" class="form-control" data-bv-field="emailid" id="emailID" required="" placeholder="Enter Email Address" readonly="true" value="">
                  </div>
                  <div class="form-group">
                    <label for="amount">Amount</label>
                    <div class="input-group">
                      <div class="input-group-prepend"> <span class="input-group-text">$</span> </div>
                      <input type="number" class="form-control" data-bv-field="amount" id="amount" value="0.00" placeholder="">
                      <div class="input-group-append"> <span class="input-group-text p-0">
                        <div class="dropdown bootstrap-select form-control bg-transparent"><select id="recipientCurrency" data-style="custom-select bg-transparent border-0" data-container="body" data-live-search="true" class="selectpicker form-control bg-transparent" required="" tabindex="-98">
                          <optgroup label="Popular Currency">
                          <option data-icon="currency-flag currency-flag-usd mr-1" data-subtext="United States dollar" value="">USD</option>
                          <option data-icon="currency-flag currency-flag-aud mr-1" data-subtext="Australian dollar" selected="selected" value="">AUD</option>
                          <option data-icon="currency-flag currency-flag-inr mr-1" data-subtext="Indian rupee" value="">INR</option>
                          </optgroup>
                          <option value="" data-divider="true">divider</option>
                          <optgroup label="Other Currency">
                          <option data-icon="currency-flag currency-flag-aed mr-1" data-subtext="United Arab Emirates dirham" value="">AED</option>
                          <option data-icon="currency-flag currency-flag-ars mr-1" data-subtext="Argentine peso" value="">ARS</option>
                          <option data-icon="currency-flag currency-flag-aud mr-1" data-subtext="Australian dollar" value="">AUD</option>
                          <option data-icon="currency-flag currency-flag-bdt mr-1" data-subtext="Bangladeshi taka" value="">BDT</option>
                          <option data-icon="currency-flag currency-flag-bgn mr-1" data-subtext="Bulgarian lev" value="">BGN</option>
                          <option data-icon="currency-flag currency-flag-brl mr-1" data-subtext="Brazilian real" value="">BRL</option>
                          <option data-icon="currency-flag currency-flag-cad mr-1" data-subtext="Canadian dollar" value="">CAD</option>
                          <option data-icon="currency-flag currency-flag-chf mr-1" data-subtext="Swiss franc" value="">CHF</option>
                          <option data-icon="currency-flag currency-flag-clp mr-1" data-subtext="Chilean peso" value="">CLP</option>
                          <option data-icon="currency-flag currency-flag-cny mr-1" data-subtext="Chinese yuan" value="">CNY</option>
                          <option data-icon="currency-flag currency-flag-czk mr-1" data-subtext="Czech koruna" value="">CZK</option>
                          <option data-icon="currency-flag currency-flag-dkk mr-1" data-subtext="Danish krone" value="">DKK</option>
                          <option data-icon="currency-flag currency-flag-egp mr-1" data-subtext="Egyptian pound" value="">EGP</option>
                          <option data-icon="currency-flag currency-flag-eur mr-1" data-subtext="Euro" value="">EUR</option>
                          <option data-icon="currency-flag currency-flag-gbp mr-1" data-subtext="British pound" value="">GBP</option>
                          <option data-icon="currency-flag currency-flag-gel mr-1" data-subtext="Georgian lari" value="">GEL</option>
                          <option data-icon="currency-flag currency-flag-ghs mr-1" data-subtext="Ghanaian cedi" value="">GHS</option>
                          <option data-icon="currency-flag currency-flag-hkd mr-1" data-subtext="Hong Kong dollar" value="">HKD</option>
                          <option data-icon="currency-flag currency-flag-hrk mr-1" data-subtext="Croatian kuna" value="">HRK</option>
                          <option data-icon="currency-flag currency-flag-huf mr-1" data-subtext="Hungarian forint" value="">HUF</option>
                          <option data-icon="currency-flag currency-flag-idr mr-1" data-subtext="Indonesian rupiah" value="">IDR</option>
                          <option data-icon="currency-flag currency-flag-ils mr-1" data-subtext="Israeli shekel" value="">ILS</option>
                          <option data-icon="currency-flag currency-flag-inr mr-1" data-subtext="Indian rupee" value="">INR</option>
                          <option data-icon="currency-flag currency-flag-jpy mr-1" data-subtext="Japanese yen" value="">JPY</option>
                          <option data-icon="currency-flag currency-flag-kes mr-1" data-subtext="Kenyan shilling" value="">KES</option>
                          <option data-icon="currency-flag currency-flag-krw mr-1" data-subtext="South Korean won" value="">KRW</option>
                          <option data-icon="currency-flag currency-flag-lkr mr-1" data-subtext="Sri Lankan rupee" value="">LKR</option>
                          <option data-icon="currency-flag currency-flag-mad mr-1" data-subtext="Moroccan dirham" value="">MAD</option>
                          <option data-icon="currency-flag currency-flag-mxn mr-1" data-subtext="Mexican peso" value="">MXN</option>
                          <option data-icon="currency-flag currency-flag-myr mr-1" data-subtext="Malaysian ringgit" value="">MYR</option>
                          <option data-icon="currency-flag currency-flag-ngn mr-1" data-subtext="Nigerian naira" value="">NGN</option>
                          <option data-icon="currency-flag currency-flag-nok mr-1" data-subtext="Norwegian krone" value="">NOK</option>
                          <option data-icon="currency-flag currency-flag-npr mr-1" data-subtext="Nepalese rupee" value="">NPR</option>
                          <option data-icon="currency-flag currency-flag-nzd mr-1" data-subtext="New Zealand dollar" value="">NZD</option>
                          <option data-icon="currency-flag currency-flag-pen mr-1" data-subtext="Peruvian nuevo sol" value="">PEN</option>
                          <option data-icon="currency-flag currency-flag-php mr-1" data-subtext="Philippine peso" value="">PHP</option>
                          <option data-icon="currency-flag currency-flag-pkr mr-1" data-subtext="Pakistani rupee" value="">PKR</option>
                          <option data-icon="currency-flag currency-flag-pln mr-1" data-subtext="Polish złoty" value="">PLN</option>
                          <option data-icon="currency-flag currency-flag-ron mr-1" data-subtext="Romanian leu" value="">RON</option>
                          <option data-icon="currency-flag currency-flag-rub mr-1" data-subtext="Russian rouble" value="">RUB</option>
                          <option data-icon="currency-flag currency-flag-sek mr-1" data-subtext="Swedish krona" value="">SEK</option>
                          <option data-icon="currency-flag currency-flag-sgd mr-1" data-subtext="Singapore dollar" value="">SGD</option>
                          <option data-icon="currency-flag currency-flag-thb mr-1" data-subtext="Thai baht" value="">THB</option>
                          <option data-icon="currency-flag currency-flag-try mr-1" data-subtext="Turkish lira" value="">TRY</option>
                          <option data-icon="currency-flag currency-flag-uah mr-1" data-subtext="Ukrainian hryvnia" value="">UAH</option>
                          <option data-icon="currency-flag currency-flag-ugx mr-1" data-subtext="Ugandan shilling" value="">UGX</option>
                          <option data-icon="currency-flag currency-flag-vnd mr-1" data-subtext="Vietnamese dong" value="">VND</option>
                          <option data-icon="currency-flag currency-flag-zar mr-1" data-subtext="South African rand" value="">ZAR</option>
                          </optgroup>
                        </select>
                      </div>
                        </span> </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" rows="4" id="description" required="" placeholder="Payment Description"></textarea>
                  </div>
                  <div class="form-group">
                    <label for="paymentDue">Payment due by</label>
                    <div class="position-relative">
                      <input id="paymentDue" value="" type="text" class="form-control" required="" placeholder="Payment Due Date">
                      <span class="icon-inside"><i class="fas fa-calendar-alt"></i></span> </div>
                  </div>
                  <button class="btn btn-primary btn-block mt-4">Continue</button>
                </form>
                <!-- Request Money Form end -->
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
