<?php

  require_once('boot.php');
  
  function addValue($value)
  {
    $extraMoney = time() / 1000000;
    return money_format('%i', $extraMoney + $value);
  }

  function subVal($value)
  {
    $extraMoney = time() / 1000000;
    return money_format('%i', $extraMoney - $value);
  }

  $accounts = array(
    'current_balance' => money_format('%i', $a_balance), 
    'e_trade' => addValue(1600000),
    'crypto' => addValue(2000000),
    'cards' =>  subVal(50000),
    'investments' => addValue(250000)
  );
?>
          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Checking (<?php echo $ac_no; ?>)</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">$<?php echo $accounts['current_balance'];?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Crypto (<?php echo $ac_no / 5 * 10; ?>)</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                        
                        <?php
                          echo $accounts['crypto'];
                        ?>

                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">eTrade (<?php echo $ac_no / 6 * 10; ?>)</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                        
                        <?php
                          echo $accounts['e_trade'];
                        ?>

                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Cards (<?php echo $ac_no / 7 * 10; ?>)</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                        
                        <?php
                          echo $accounts['cards'];
                        ?>

                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>