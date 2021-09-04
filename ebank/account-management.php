<?php

  include './boot.php';
  include './inc/tf-query.php';
  $show = true;
?>
<!DOCTYPE html>
<html>
  <head>

    <?php include_once './inc/head.php'; ?>
  </head>
  <body>
    <?php include_once './inc/header.php'; ?>
    <div class="page-content">
    	<div class="row">
            <div class="col-md-2">
                <?php include_once './inc/nav.php'; ?>
            </div>
		    <div class="col-md-7">
            <div class="row top-overview">
              <div class="col-md-4">
                <aside class="">
                    <p style="text-align: center;">
                      <?php
                        if (isset($_SESSION['user']['image']) && strlen($_SESSION['user']['image']) > 3 ) {
                          $image = $_SESSION['user']['image'];
                        } else {
                          $image =  HOST.'/images/proxy.duckduckgo.com.png';
                        }
                      ?>
                      <img src="<?php echo $image; ?>"  style="width:8rem">
                    </p>
                </aside>
              </div>
              <div class="col-md-7">
                <div class="">
                  <h3>
                    <small>Welcome</small> <br /><b><?php echo "$firstname $lastname"; ?></b>
                  </h3>
                  
                  <p>Current Balance:</p>
                  <p style="
                      font-weight: 800;
                      font-size: 25px;
                      position: relative;
                      top: -7px;
                  ">
                    <small style="
                        font-size: smaller;
                        font-weight: 100;
                    ">USD$
                    </small>
                    <?php echo $a_balance; ?>
                  </p>
                 </div> 
              </div>
            </div>
            <?php include_once './inc/overview.php'; ?>
		        <?php include_once './inc/recent-transactions.php'; ?>
    		  	
                
		    </div>
            <?php include_once './inc/sidebar.php'; ?>
		</div>
    </div>

    <?php include_once './inc/footer.php'; ?>
    <?php include 'modal.php'; ?>
    
  </body>
</html>
