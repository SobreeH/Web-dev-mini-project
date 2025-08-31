<?php
  include 'condb.php';
   $dbname = "bookmarker";
  if ($conn->select_db($dbname)) {
    echo "Database ".$dbname." selected successfully! <br>";
} 
else {
    echo "Error selecting database: " . $conn->error;
}
    
    $username = $_REQUEST['username'];
    $password = $_REQUEST['password'];
    $email = $_REQUEST['email'];
	
    $before=$_REQUEST['before'];

    $sql = "UPDATE users SET username='$username', password='$password', email='$email' WHERE user_id='$before'";

    if($conn->query($sql)===TRUE){
     include "showuser.php";
    }
    
?>