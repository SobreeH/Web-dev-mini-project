<?php
    include "db.php";
    session_start();

    $list_id = $_GET['list_id'];
    $dbname = "bookmarker";
    
    if(!$conn->select_db($dbname)){
        echo "Error selecting database: " . $conn->error;
        exit();
    }

    // Get all books to populate the dropdown menu
    $books_query = "SELECT book_id, title, author FROM books ORDER BY title ASC";
    $books_result = $conn->query($books_query);
    
    // Get the current reading list item's data to pre-select the book and status
    $stmt = $conn->prepare("
        SELECT 
            reading_list.list_id, 
            reading_list.book_id,
            reading_list.status 
        FROM reading_list 
        WHERE reading_list.list_id = ?
    ");
    $stmt->bind_param("i", $list_id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Reading List Item</title>
</head>
<body>
    <center>
        <h2>Edit Book in Reading List</h2>
        <form action="editlist.php" method="POST">
            <input type="hidden" name="list_id" value="<?php echo htmlspecialchars($row['list_id']); ?>">
            
            <label for="book_id">Select Book:</label><br>
            <select id="book_id" name="book_id" required>
                <?php
                if ($books_result->num_rows > 0) {
                    while($book_row = $books_result->fetch_assoc()) {
                        $selected = ($book_row['book_id'] == $row['book_id']) ? 'selected' : '';
                        echo "<option value='" . htmlspecialchars($book_row['book_id']) . "' $selected>" . htmlspecialchars($book_row['title']) . " by " . htmlspecialchars($book_row['author']) . "</option>";
                    }
                } else {
                    echo "<option value=''>No books available</option>";
                }
                ?>
            </select><br><br>
            
            <label for="status">Status:</label><br>
            <select id="status" name="status">
                <option value="to-read" <?php if($row['status'] == 'to-read') echo 'selected'; ?>>To Read</option>
                <option value="in-progress" <?php if($row['status'] == 'in-progress') echo 'selected'; ?>>In Progress</option>
                <option value="completed" <?php if($row['status'] == 'completed') echo 'selected'; ?>>Completed</option>
            </select><br><br>
            
            <input type="submit" value="Update List Item">
        </form>
        <br>
        <a href="reading-list.php">Back to Reading List</a>
    </center>
</body>
</html>
<?php
    } else {
        echo "<center>No record found for this ID.</center>";
    }
    $stmt->close();
    $conn->close();
?>