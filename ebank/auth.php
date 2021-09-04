<?php

require './boot.php';

header('Access-Control-Allow-Origin: *');

header('Access-Control-Allow-Methods: GET, POST');

header("Access-Control-Allow-Headers: X-Requested-With");

if (!empty($_POST['USER_NAME']) && !empty($_POST['PASS_WORD'])) {
  // cred is sent. attempt login
  $user = mysqli_real_escape_string($db, strtolower($_POST['USER_NAME']));
  $pass = mysqli_real_escape_string($db, strtolower($_POST['PASS_WORD']));

  $query = "SELECT * FROM profile WHERE (user = '$user' OR email = '$user') AND pass = '$pass'";
  if(!$result = $db->query($query)){
      die('There was an error running the query [' . $db->error . ']');
  }

  if(mysqli_num_rows($result) > 0){
    $r = mysqli_fetch_array($result);
    $_SESSION['user'] = $currentUser = $r;
    header('Location:  ' . HOST . '/index.php?msg=Welcome to eBanking.&badauth=1');
  }else{
    if (isset($_POST['xhr'])) {
      echo json_encode(array('auth'=> false));
    } else {
      header('Location:  ' . HOST . '/login.php?msg=Invalid Session&badauth=1');
    }
  }
}


?>