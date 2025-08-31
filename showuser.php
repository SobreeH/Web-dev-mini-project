<?php
    include "condb.php";
    $dbname = "bookmarker";
    if($conn -> select_db($dbname)){
        echo "Darabase".$dbname."selected successfully!<br>";
    }
    else{
        echo "Error selecting database:".$conn ->error;
    }

    $sql = "SELECT * FROM users";
    $result = $conn -> query($sql);

    if($result -> num_rows > 0){
        echo "<table border='1' align='center' cellpadding='10'>";
        echo "<tr>
        <td>username</td>
        <td>password</td>
        <td>email</td>
        <td>register_date</td>
        <td>edit</td>
        <td>delete</td>        
        </tr>";
        while($row = $result -> fetch_assoc()){
            $username = "&username=".$row["username"];
            $password = "&password=".$row["password"];
            $email = "&email=".$row["email"];
            $register_date = "&register_date=".$row["register_date"];
            $user_id ="&user_id=".$row["user_id"];

            echo "<tr>";
        echo "<td>"  .$row["username"] .   "</td> "; 
        echo "<td>"  .$row["password"] .   "</td> "; 
        echo "<td>"  .$row["email"] .   "</td> ";  
        echo "<td>"  .$row["register_date"] .    "</td> ";
        
        //แก้ไข
        echo "<td><a href='formedituser.php?".$username,$password,$email,$register_date,$user_id."'>edit</a></td> ";

        //ลบตาราง
        echo "<td><a href='deleteuser.php?".$user_id."'>delete</a></td> ";
        echo "</tr>";

        
        }
        
        
        echo "</table>";
    }

?>