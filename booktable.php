<?php
    include "condb.php";
    $dbname = "bookmarker";
    if($conn -> select_db($dbname)){
        echo "Darabase".$dbname."selected successfully!<br>";
    }
    else{
        echo "Error selecting database:".$conn ->error;
    }
   
        $title = $_POST['title'];
        $author = $_POST['author'];
        $genre = $_POST['genre'];
        $publication_year = $_POST['publication_year'];
        
    
    $stmt = $conn -> prepare("insert into books(title,author,genre,publication_year) values(?,?,?,?)");
    $stmt ->bind_param("sssi",$title,$author,$genre,$publication_year);
    $execval = $stmt -> execute();
    echo $execval;

    header('Location: login.php');
    exit();
    
    
?>