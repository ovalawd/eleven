


    <!--DEV initial map parameters are set in data options. This should be a valid JSON object. Center should match backedn search. Zoom should default to 6, but if backend search should be set to 10-->

<!-- check for recent transfers  -->
<?php
  $fromAccount = $currentUser[9];
  $qryagain = mysql_query("SELECT * FROM transfers WHERE account_no = '$fromAccount' ORDER BY transaction_date DESC, id DESC") or die('Connection not Secured');
  if(mysql_num_rows($qryagain)>0){
    $raar = mysql_fetch_array($qryagain, MYSQL_ASSOC);
    $tfAccount = $raar['account_no'];
    $transaction_id = $raar['transaction_id'];
    $transaction_status = $raar['transaction_status'];
    $transaction_amount = $raar['transaction_amount'];
    //set session
?>

    <div id="_ctl0_AccountPane">
    <h3>Recent Transactions</h3>
    <div class="tableContainer">
    <table class="responsive dispTable" cellspacing="0" rules="all" border="1" id="_ctl0_ItemsGrid" style="height:80px;width:100%;border-collapse:collapse;">
      <tbody>
        <tr align="center" valign="middle" style="color:White;background-color:Gray;font-weight:bold;font-style:normal;text-decoration:none;">
          <td align="center" valign="middle" style="font-weight:bold;font-style:normal;text-decoration:none;">
            Account Number
          </td>
          <td>Reference</td>
          <td align="center" style="font-weight:bold;font-style:normal;text-decoration:none;">
            Amount
          </td>
          <td>Transaction Status</td>
        </tr>
        <tr align="center" style="font-weight:normal;font-style:normal;text-decoration:none;">

          <td align="center" style="font-weight:normal;font-style:normal;text-decoration:none;">
            <p style="font-size: 13px"><?php echo $tfAccount; ?></p>
          </td>
          <td align="center" style="font-weight:normal;font-style:normal;text-decoration:none;">
            <p style="font-size: 13px"><?php echo $transaction_id; ?></p>
          </td>
          <td align="center" style="font-weight:normal;font-style:normal;text-decoration:none;">
            <p style="font-size: 13px"><?php echo "USD$ $number_format('%i', $transaction_amount)"; ?></p>
          </td>
          <td align="center" style="font-weight:normal;font-style:normal;text-decoration:none;">
            <p style="font-size: 13px"><?php echo "$transaction_status"; ?></p>
          </td>

        </tr>
    </tbody></table>
                </div>
    </div>
<?php

  }


?>

    <div id="_ctl0_AccountPane">
<h3>Account Status</h3>
<div class="tableContainer">
<table class="responsive dispTable" cellspacing="0" rules="all" border="1" id="_ctl0_ItemsGrid" style="height:128px;width:100%;border-collapse:collapse;">
  <tbody>
    <tr align="center" valign="middle" style="color:White;background-color:Gray;font-weight:bold;font-style:normal;text-decoration:none;">
    <td align="center" valign="middle" style="font-weight:bold;font-style:normal;text-decoration:none;">Account Number</td><td>Internal Reference</td><td align="center" style="font-weight:bold;font-style:normal;text-decoration:none;">Account Type</td><td align="center">Currency </td><td>Book Balance</td><td> Balance</td><td>Account Status</td>
  </tr><tr align="center" style="font-weight:normal;font-style:normal;text-decoration:none;">
    <td align="center" style="font-weight:normal;font-style:normal;text-decoration:none;"><a href="#"><?php echo $ac_no; ?></a></td><td align="center" style="font-weight:normal;font-style:normal;text-decoration:none;">758/382048/1/21/0</td><td align="center" style="font-weight:normal;font-style:normal;text-decoration:none;">CURRENT ACCOUNT</td><td align="center">USD$ </td><td align="right"><?php echo "number_format('%i', $c_balance)"; ?></td><td align="right">         <?php echo "number_format('%i', $a_balance)"; ?></td><td align="center" style="font-weight:normal;font-style:normal;text-decoration:none;">Active</td>
  </tr>
</tbody></table>
            </div>
<p>* Click on the <strong>Account Number</strong> to see details for an account.</p>
</div><div class="store-finder-key">
        <dl>
            <dt>Coming soon</dt>
            <dd>
                <img src="icon-coming-soon.png" class="icon-coming-soon" alt="" height="33" width="33"></dd>
            <dt>Now open</dt>
            <dd>
                <img src="icon-now-open.png" class="icon-now-open" alt="" height="33" width="33"></dd>
        </dl>
    </div>