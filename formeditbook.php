<?php
// Include your database connection file
include "db.php";

// Get the book details from the URL parameters
$book_id = $_GET['book_id'];
$title = $_GET['title'];
$author = $_GET['author'];
$genre = $_GET['genre'];
$publication_year = $_GET['publication_year'];
$before =$book_id;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Book</title>
</head>
<body>
    <center>
        <h2>Edit Book</h2>
        <form action="editbook.php" method="post">
            <input type="hidden" name="book_id" value="<?php echo $book_id; ?>">

            Title: <input type="text" name="title" value="<?php echo htmlspecialchars($title); ?>"><br><br>
            Author: <input type="text" name="author" value="<?php echo htmlspecialchars($author); ?>"><br><br>
            Genre: <input type="text" name="genre" value="<?php echo htmlspecialchars($genre); ?>"><br><br>
            Publication Year: <input type="text" name="publication_year" value="<?php echo htmlspecialchars($publication_year); ?>"><br><br>

            <input type="submit" value="Update Book">
        </form>
        <a href="showbook-admin.php">Cancel</a>
    </center>
</body>
</html>