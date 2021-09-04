<?php
  $fromAccount = $_SESSION['user'][9];
  $query = "SELECT * FROM transfers WHERE account_no = '$fromAccount' ORDER BY transaction_date DESC, id DESC LIMIT 10";

  if(!$result = $db->query($query)){
      die('There was an error running the query [' . $db->error . ']');
  }

  $raar = array();
  if(mysqli_num_rows($result) > 0){
    while ($row = mysqli_fetch_array($result)) {
    	$raar[] = $row;
    }
  }
?>