<?php
ini_set('display_startup_errors',1);
ini_set('display_errors',1);
error_reporting(-1);

require("./config.php");

//start session
session_start();

$db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if($db->connect_errno > 0){
    die('Unable to connect to database ');
}
function loginUser ($username, $password) {
  global $db;
  $query = "SELECT * FROM profile WHERE (user = '$username' OR email = '$username') AND pass = '$password'";
  
  if(!$result = $db->query($query)){
    return false;
  }
  
  if(mysqli_num_rows($result) > 0){
      $r = mysqli_fetch_array($result);
      $_SESSION['user'] = $currentUser = $r;    
      
      return $r;
  } else {
    return false;
  }
}


$o = "";
$a_balance = 0;

// if there is already an existing user session
setlocale(LC_MONETARY, 'en_US.utf8');
if (isset($_SESSION['user']) && isset($_SESSION['user']['id'])) {
    $user = $_SESSION['user']['user'];
    $email = $_SESSION['user']['email'];
    $pass = $_SESSION['user']['pass'];

    $isLoggedIn = loginUser($user, $pass);
    if (!$isLoggedIn) {
      header('Location:  ' . HOST . '/login.php?msg=Invalid Session. Please login here.&badauth=1');
    } else {
      list( 
        $id,
        $firstname,
        $lastname,
        $location,
        $user,
        $pass,
        $email, 
        $a_balance,
        $c_balance, 
        $ac_no,  
        $pin,
        $userImage,
        $currency, 
      ) = $isLoggedIn;      
    }
} else {
   header('Location:  ' . HOST . '/login.php?msg=Invalid Session. Please login here.&badauth=1');
}


function printBalance () {
  global $a_balance;
  echo money_format('%i', $a_balance);
} 

?>