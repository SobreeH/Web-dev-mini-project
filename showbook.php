<?php
    include "db.php";
    $dbname = "bookmarker";
    if($conn -> select_db($dbname)){
        echo "Darabase".$dbname."selected successfully!<br>";
    }
    else{
        echo "Error selecting database:".$conn ->error;
    }

    $sql = "SELECT * FROM books";
    $result = $conn -> query($sql);

    if($result -> num_rows > 0){
        echo "<table border='1' align='center' cellpadding='10'>";
        echo "<tr>
        <td>title</td>
        <td>password</td>
        <td>email</td>
        <td>register_date</td>
        <td>edit</td>
        <td>delete</td>        
        </tr>";
        while($row = $result -> fetch_assoc()){
            $title = "&title=".$row["title"];
            $author = "&author=".$row["author"];
            $genre = "&genre=".$row["genre"];
            $publication_year = "&publication_year=".$row["publication_year"];
            $book_id = "&book_id=".$row["book_id"];

            echo "<tr>";
        echo "<td>"  .$row["title"] .   "</td> "; 
        echo "<td>"  .$row["author"] .   "</td> "; 
        echo "<td>"  .$row["genre"] .   "</td> ";  
        echo "<td>"  .$row["publication_year"] .    "</td> ";
        
        //แก้ไข
        echo "<td><a href='formeditbook.php?".$title,$author,$genre,$publication_year,$book_id."'>edit</a></td> ";

        //ลบตาราง
        echo "<td><a href='deletebook.php?" .$book_id. "'>delete</a></td>";
        echo "</tr>";

        
        }
         echo "</table>";
        echo "<center><a href='book.php'><br>[Insert]</a></center>";
    }
     else {
    echo "<center>ไม่มีข้อมูล</center>";
    echo "<center><a href='studenttt.php'><br>[Insert]</a></center>";
    }

?>