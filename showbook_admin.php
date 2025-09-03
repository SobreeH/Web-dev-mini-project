<?php
    include "db.php";
    $dbname = "bookmarker";
    if ($conn->select_db($dbname)) {
        echo "Database " . $dbname . " selected successfully!<br>";
    } else {
        echo "Error selecting database:" . $conn->error;
    }

    $sql = "SELECT * FROM books";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table border='1' align='center' cellpadding='10'>";
        echo "<tr>
        <td>title</td>
        <td>author</td>
        <td>genre</td>
        <td>publication year</td>
        <td>edit</td>
        <td>delete</td>
        </tr>";
        
        while ($row = $result->fetch_assoc()) {
            $book_id = $row["book_id"];
            
            // Encode URL parameters
            $title = urlencode($row["title"]);
            $author = urlencode($row["author"]);
            $genre = urlencode($row["genre"]);
            $publication_year = urlencode($row["publication_year"]);
            
            echo "<tr>";
            echo "<td>" . $row["title"] . "</td>";
            echo "<td>" . $row["author"] . "</td>";
            echo "<td>" . $row["genre"] . "</td>";
            echo "<td>" . $row["publication_year"] . "</td>";
            
            // Correct edit link with all parameters
            echo "<td><a href='formeditbook.php?book_id={$book_id}&title={$title}&author={$author}&genre={$genre}&publication_year={$publication_year}'>edit</a></td>";
            
            // Correct delete link
            echo "<td><a href='deletebook.php?book_id={$book_id}'>delete</a></td>";
            echo "</tr>";
        }
        echo "</table>";
        
        echo "<center><a href='book.php'><br>[Insert]</a></center>";
        echo "<center><a href='admin-page.php'><br>[Back]</a></center>";
        
    } else {
        echo "<center>No data found</center>";
        echo "<center><a href='book.php'><br>[Insert]</a></center>";
    }
?>