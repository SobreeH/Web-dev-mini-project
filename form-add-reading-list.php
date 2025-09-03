<?php
    include "db.php";
    session_start();

    $dbname = "bookmarker";
    
    // Select the database
    if(!$conn->select_db($dbname)){
        echo "Error selecting database: " . $conn->error;
        exit();
    }

    // Get all books to populate the dropdown menu
    $books_query = "SELECT book_id, title, author FROM books ORDER BY title ASC";
    $books_result = $conn->query($books_query);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Add to Reading List</title>
</head>
<body>
    <center>
        <h2>Add a New Book to Your Reading List</h2>
        <form action="addlist.php" method="POST">
            
            <label for="book_id">Select Book:</label><br>
            <select id="book_id" name="book_id" required>
                <option value="">-- Select a Book --</option>
                <?php
                if ($books_result->num_rows > 0) {
                    while($book_row = $books_result->fetch_assoc()) {
                        echo "<option value='" . htmlspecialchars($book_row['book_id']) . "'>" . htmlspecialchars($book_row['title']) . " by " . htmlspecialchars($book_row['author']) . "</option>";
                    }
                }
                ?>
            </select><br><br>
            
            <label for="status">Status:</label><br>
            <select id="status" name="status">
                <option value="to-read">To Read</option>
                <option value="in-progress">In Progress</option>
                <option value="completed">Completed</option>
            </select><br><br>
            
            <input type="submit" value="Add to List">
        </form>
        <br>
        <a href="show_reading_list.php">Back to Reading List</a>
    </center>
</body>
</html>
<?php
    $conn->close();
?>