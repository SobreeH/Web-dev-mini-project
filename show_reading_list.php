<?php
    include "db.php";
    session_start();

    $username=$_SESSION['username'];
    $dbname = "bookmarker";
    if($conn -> select_db($dbname)){
        echo "Database ".$dbname." selected successfully!<br>";
    }
    else{
        echo "Error selecting database:".$conn ->error;
    }
    // Get user_id from username
    $check_userid = "SELECT user_id FROM users WHERE username='$username'";
    $userResult = $conn -> query($check_userid);
    if ($userResult -> num_rows > 0){
        $userRow = $userResult -> fetch_assoc();
        $user_id = $userRow['user_id'];
        
        
        // Creating table to show reading for specific user

        $select_readinglist = "SELECT * FROM reading_list INNER JOIN books ON reading_list.book_id = books.book_id WHERE reading_list.user_id = '$user_id';";
        $result = $conn -> query($select_readinglist);

        if ($result -> num_rows > 0) {
        echo "<table border='1' align='center' cellpadding='10'>";
        echo "<caption>User</caption>
        <tr>
        <th>title</th>
        <th>author</th>
        <th>genre</th>
        <th>publication year</th>
        <th>status<th>
        </tr>";
        while ($row = $result -> fetch_assoc()) {
            $title = "&title=".$row["title"];
            $author = "&author=".$row["author"];
            $genre = "&genre=".$row["genre"];
            $publication_year = "&publication_year=".$row["publication_year"]; 
            $status = "&status=".$row["status"];
        echo "<tr>";
        echo "<td>".$row["title"]."</td> "; 
        echo "<td>".$row["author"]."</td> "; 
        echo "<td>".$row["genre"]."</td> ";  
        echo "<td>".$row["publication_year"] ."</td> ";
        echo "<td>".$row["status"]."</td>";
        echo "<td><a href='deletelist.php?".$id."'>[edit]</a></td> ";
        echo "<td><a href='deletelist.php?".$id."'>[delete]</a></td> ";
        echo "</tr>";
        }
        echo "</table>";
        
        }
    } 
    
   
   

        echo "<center><a href='form-add-reading-list.php'><br>[Insert]</a></center>";
        echo "<center><a href='user-page.php'><br>[Back]</a></center>";
        ?>