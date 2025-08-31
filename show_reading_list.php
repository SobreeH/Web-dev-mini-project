<?php
    include "db.php";
    $dbname = "bookmarker";
    if($conn -> select_db($dbname)){
        echo "Darabase".$dbname."selected successfully!<br>";
    }
    else{
        echo "Error selecting database:".$conn ->error;
    }

    $sql = "SELECT * FROM reading_list";
    $result = $conn -> query($sql);

    if($result -> num_rows > 0){
        echo "<table border='1' align='center' cellpadding='10'>";
        echo "<tr>
        <td>list id</tb>
        <td>user id</tb>
        <td>status</tb>
        <td>rating</tb>
        <td>notes</tb>
        </tr>";
        while($row = $result -> fetch_assoc){
            $list_id = "&=list_id".$row["list_id"];
            $user_id = "&user_id=".$row["user_id"];
            $status = "&status=".$row["staus"];
            $rating = "&year=".$row["rating"];
            $notes = "&notes=".$row["notes"];
        }
        echo "<tr>";
        echo "<td>"  .$row["list_id"] .   "</td> "; 
        echo "<td>"  .$row["user_id"] .   "</td> "; 
        echo "<td>"  .$row["status"] .   "</td> ";  
        echo "<td>"  .$row["year"] .    "</td> ";
        echo "<td>"  .$row["notes"] .   "</td> "; 
        

        echo "</table>";
    }

?>