<?php
  include 'condb.php';
   $dbname = "bookmarker";
  if ($conn->select_db($dbname)) {
    echo "Database ".$dbname." selected successfully! <br>";
} else {
    echo "Error selecting database: " . $conn->error;
}

$book_id=$_REQUEST['book_id'];

$sql="DELETE FROM books WHERE book_id='$book_id'";
if($conn->query($sql)===TRUE){
  include "showbook.php";
}
?>