<?php
    include "condb.php";
    $dbname = "bookmarker";
    if($conn -> select_db($dbname)){
        echo "Darabase".$dbname."selected successfully!<br>";
    }
    else{
        echo "Error selecting database:".$conn ->error;
    }
   
        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $register_date = $_POST['register_date'];
        
    
    $stmt = $conn -> prepare("insert into users(username,password,email,register_date) values(?,?,?,?)");
    $stmt ->bind_param("ssss",$username,$password,$email,$register_date);
    $execval = $stmt -> execute();
    echo $execval;

    header('Location: login.php');
    exit();
    
    
?>