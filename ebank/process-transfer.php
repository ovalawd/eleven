<?php
  include './boot.php';
  $currentUser = $isLoggedIn;
  $current_user_ac_no = $currentUser['ac_no'];
  $current_user_full_name = $currentUser['firstname'].' '.$currentUser['lastname'] ;
  $destination_ac_no = mysqli_real_escape_string($db, $_POST['ben-cust-ac-no']);
  $destination_ac_name = mysqli_real_escape_string($db, $_POST['ben-cust-name']);
  $amount = mysqli_real_escape_string($db, $_POST['transaction-amount']);

  $b = "SELECT a_balance FROM profile WHERE ac_no = '$destination_ac_no'";

  if(!$result = $db->query($b)){
      die('There was an error running the query [' . $db->error . ']');
  }

  if(mysqli_num_rows($result) > 0) {
    $destination_ac_balance = (int)mysqli_fetch_row($result)[0];
  }


  // Start financial update
  try {
    if ($_POST['transferMethod'] == 'incoming-funds') {
      // reduce the senders balance.
      $current_user_ac_new_balance = $currentUser['a_balance'] - $_POST['transaction-amount'];
      //set the query
      $sqlqwryDeduction ="UPDATE profile SET a_balance = '$current_user_ac_new_balance' WHERE profile.ac_no = '$current_user_ac_no'";
      // exec
      $db->query($sqlqwryDeduction);

      $destination_ac_new_balance = $destination_ac_balance + $_POST['transaction-amount'];
      $sqlqwryAddition ="UPDATE profile SET a_balance = '$destination_ac_new_balance' WHERE profile.ac_no = '$destination_ac_no'";
      $db->query($sqlqwryAddition);
    } 
    if ($_POST['transferMethod'] == 'outgoing-funds') {
      // reduce the senders balance.
      $current_user_ac_new_balance = $currentUser['a_balance'] - $_POST['transaction-amount'];
      //set the query
      $sqlqwryDeduction ="UPDATE profile SET a_balance = '$current_user_ac_new_balance' WHERE profile.ac_no = '$current_user_ac_no'";
      // exec
      $db->query($sqlqwryDeduction);
    } 
  } catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
  }
  //end of financial update

  // start transaction logs

  $benCustName = mysqli_real_escape_string($db, $_POST['ben-cust-name']);
  // $fromAccount = $currentUser["ac_no"];

  $tranid = uniqid('Y_');
  $datetoday = date('Y-m-d H:i:s');
  $mobileNo = mysqli_real_escape_string($db, $_POST['ben-cust-phone']);

  $dump = $_POST;

  try {
    // start of transfer log
    if ($_POST['transferMethod'] == 'incoming-funds') {
      $source_funds_name = $_POST['s-s-name'];
      $dump['transferMethod'] = 'outgoing-funds';
      $f_dump = json_encode($dump);
      $sourceSQL = "INSERT INTO `transfers` (`id`, `sender`, `account_no`, `transaction_amount`, `transaction_id`, `transaction_date`, `transaction_status`, `trnx_desc`) VALUES (NULL, '$current_user_full_name', '$current_user_ac_no', '$amount', '$tranid', '$datetoday', '', '$f_dump');";
      
      $dump['transferMethod'] = 'incoming-funds';
      $f_dump = json_encode($dump);
      $destSQL = "INSERT INTO `transfers` (`id`, `sender`, `account_no`, `transaction_amount`, `transaction_id`, `transaction_date`, `transaction_status`, `trnx_desc`) VALUES (NULL, '$destination_ac_name', '$destination_ac_no', '$amount', '$tranid', '$datetoday', '', '$f_dump');";
      $db->query($sourceSQL);
      $db->query($destSQL);

    }
  
    if ($_POST['transferMethod'] == 'outgoing-funds') {
      $dump['transferMethod'] = 'outgoing-funds';
      $f_dump = json_encode($dump);
      $destSQL = "INSERT INTO `transfers` (`id`, `sender`, `account_no`, `transaction_amount`, `transaction_id`, `transaction_date`, `transaction_status`, `trnx_desc`) VALUES (NULL, '$current_user_full_name', '$current_user_ac_no', '$amount', '$tranid', '$datetoday', '', '$f_dump');";
      $db->query($destSQL);
    }
  } catch (Exception $e) {
    echo 'Caught exception: ', $e->getMessage(), "\n";
  }
  //end of keeping a log for the tf
  
  $current_user_id = $currentUser['id'];
  
  $quser = "SELECT * FROM profile WHERE id = '$current_user_id'";

  $user_session = $db->query($quser);

  if(mysqli_num_rows($user_session) > 0){
    $r = mysqli_fetch_array($user_session);
    $_SESSION['user'] = $currentUser = $r;
    $_SESSION['recent_transfer'] = json_encode($dump);
    header('Location:  ' . HOST . '/success.php?msg=Transfer Success');
  } else {
    // header('Location: ' . $_SERVER['HTTP_REFERER']);
    // echo json_encode(array('status'=> false));
  }



  die();
?>
