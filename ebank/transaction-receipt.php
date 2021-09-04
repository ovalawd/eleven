<?php
  include './boot.php';
  ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">

<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <style type="text/css">
    body,
    td,
    div,
    p,
    a,
    input {
        font-family: arial, sans-serif;
    }
    </style>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Receipt for Your Payment</title>
    <style type="text/css">
    body,
    td {
        font-size: 13px
    }

    a:link,
    a:active {
        color: #1155CC;
        text-decoration: none
    }

    a:hover {
        text-decoration: underline;
        cursor: pointer
    }

    a:visited {
        color: ##6611CC
    }

    img {
        border: 0px
    }

    pre {
        white-space: pre;
        white-space: -moz-pre-wrap;
        white-space: -o-pre-wrap;
        white-space: pre-wrap;
        word-wrap: break-word;
        max-width: 800px;
        overflow: auto;
    }
    </style>
</head>
<?php

    $currentUser = $_SESSION['user'];
    $sendTo = mysqli_real_escape_string($db, $_GET['ben-cust-name']);
    $fromAccount = $currentUser[9];
    $amount = mysqli_real_escape_string($db, $_GET['transaction-amount']);
    $tranid = uniqid('MQUIKMNY_');
    $datetoday = date('Y-m-d H:i:s');
  ?>
<body>
    <table align="center" border="0" cellpadding="0" cellspacing="0" width="600">
        <tbody>
            <tr valign="top">
                <td width="100%">
                    <table align="center" border="0" cellpadding="0" cellspacing="0" style="color:#333333!important;font-family:arial,helvetica,sans-serif;font-size:12px;    background: #1de01d;" width="600">
                        <tbody>
                            <tr valign="top">
                                <td><img class="" src="<?php echo HOST. "/img/logo.png"; ?>" alt=""  /></td>
                                <td valign="middle" align="right"><?php echo date("l, d-m-Y"); ?>
                                    <br>Transaction ID: <a href="#" target="_blank" data-saferedirecturl="#">8A895<?php echo $tranid ; ?></a></td>
                            </tr>
                        </tbody>
                    </table>
                    <div style="margin-top:30px;color:#333!important;font-family:arial,helvetica,sans-serif;font-size:12px"><span style="color:#333333!important;font-weight:bold;font-family:arial,helvetica,sans-serif">Hello <?php echo "$currentUser[1] $currentUser[2],"; ?> </span>
                        <br>
                        <br>
                        <p style="font-size:14px;color:#c88039;font-weight:bold;text-decoration:none">You have sent funds using Money Transfer to  <?php echo $sendTo; ?> </p>
                        <table cellpadding="5">
                            <tbody>
                                <tr>
                                    <td valign="top"></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                        <br>It may take a few hours for this transaction to appear in your account.
                        <br>
                        <div style="margin-top:5px;clear:both">
                            <hr size="1">
                        </div>

<table align="center" border="0" cellpadding="0" cellspacing="0" style="clear:both;color:#666666!important;font-family:arial,helvetica,sans-serif;font-size:11px;margin-top:20px" width="100%"><tbody><tr><td style="border:1px solid #ccc;border-right:none;border-left:none;padding:5px 10px 5px 10px!important;color:#333333!important" width="350" align="left">Description</td><td style="border:1px solid #ccc;border-right:none;border-left:none;padding:5px 10px 5px 10px!important;color:#333333!important" width="100" align="right">Amount</td><td style="border:1px solid #ccc;border-right:none;border-left:none;padding:5px 10px 5px 10px!important;color:#333333!important" width="50" align="right">
</td><td style="border:1px solid #ccc;border-right:none;border-left:none;padding:5px 10px 5px 10px!important;color:#333333!important" width="80" align="right">Total</td></tr><tr style="padding:10px"><td align="left" style="border-bottom:none;padding:10px">
    Outgoing Funds Transfer<br>
    <?php echo $_GET['ben-b-name']; ?><br>
    <?php echo $_GET['ben-cust-ac-no']; ?><br>
    <?php echo $_GET['ben-cust-name']; ?>

</td><td style="border-bottom:none;padding:10px" align="right">$<?php echo $amount; ?> USD</td><td style="border-bottom:none;padding:10px" align="right"></td><td style="border-bottom:none;padding:10px" align="right">$<?php echo $amount; ?> USD</td></tr></tbody></table>


<table align="left" border="0" cellpadding="0" cellspacing="0" style="border-top:1px solid #ccc;border-bottom:1px solid #ccc;clear:both;color:#666666!important;font-family:arial,helvetica,sans-serif;font-size:11px" width="595"><tbody><tr><td><table border="0" cellpadding="0" cellspacing="0" style="color:#666666!important;font-family:arial,helvetica,sans-serif;font-size:11px;margin-top:20px;clear:both;width:100%" align="right"><tbody><tr><td style="width:390px;text-align:right;padding:0 10px 0 0"><strong>Subtotal</strong></td><td style="width:90px;text-align:right;padding:0 5px 0 0">$<?php echo $amount; ?> USD</td></tr><tr><td style="width:390px;text-align:right;padding:0 10px 0 0"><span style="color:#333333!important;font-weight:bold">Total</span></td><td style="width:90px;text-align:right;padding:0 5px 0 0">$<?php echo $amount; ?> USD</td></tr><tr><td style="width:390px;text-align:right;padding:20px 10px 0 0"><span style="color:#333333!important;font-weight:bold">Payment</span></td><td style="width:90px;text-align:right;padding:20px 5px 0 0">$<?php echo $amount; ?> USD</td></tr><tr><td></td></tr></tbody></table></td></tr><tr><td style="color:#757575;padding-bottom:20px;padding-left:10px"><br></td></tr></tbody></table>
                        <br>
                        <br>
</td>
            </tr>
        </tbody>
    </table>

</body>

</html>

