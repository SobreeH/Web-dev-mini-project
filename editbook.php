<?php
  include 'condb.php';
   $dbname = "bookmarker";
  if ($conn->select_db($dbname)) {
    echo "Database ".$dbname." selected successfully! <br>";
} 
else {
    echo "Error selecting database: " . $conn->error;
}
    
    $title = $_REQUEST['title'];
    $author = $_REQUEST['author'];
    $genre = $_REQUEST['genre'];
    $publication_year = $_REQUEST['publication_year'];
	
    $before=$_REQUEST['before'];

    $sql = "UPDATE books SET title='$title', author='$author',genre='$genre', publication_year='$publication_year' WHERE book_id='$before'";

    if($conn->query($sql)===TRUE){
     include "showbook.php";
    }
    
?>