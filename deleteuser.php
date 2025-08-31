<?php
  include 'condb.php';
   $dbname = "bookmarker";
  if ($conn->select_db($dbname)) {
    echo "Database ".$dbname." selected successfully! <br>";
} else {
    echo "Error selecting database: " . $conn->error;
}

$user_id=$_REQUEST['user_id'];

$sql="DELETE FROM users WHERE user_id='$user_id'";
if($conn->query($sql)===TRUE){
  include "showuser.php";
}
?>