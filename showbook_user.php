<?php
    include "db.php";
    $dbname = "bookmarker";
    if($conn -> select_db($dbname)){
        echo "Database ".$dbname." selected successfully!<br>";
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
        <td>author</td>
        <td>genre</td>
        <td>publication year</td>

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
        

        echo "</tr>";

        
        }
         echo "</table>";
        echo "<center><a href='user-page.php'><br>[Back]</a></center>";
    }
     else {
    echo "<center>ไม่มีข้อมูล</center>";
    }

?>