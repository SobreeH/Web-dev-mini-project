<?php
// Include the database connection file
include "db.php";

// Select the database
$dbname = "bookmarker";
if($conn->select_db($dbname)){
    echo "Database " . $dbname . " selected successfully!<br>";
} else {
    echo "Error selecting database: " . $conn->error;
}

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the data from the form
    $title = $_POST['title'];
    $author = $_POST['author'];
    $genre = $_POST['genre'];
    $publication_year = $_POST['publication_year'];

    // Construct the SQL INSERT query
    $sql = "INSERT INTO books (title, author, genre, publication_year) 
            VALUES ('$title', '$author', '$genre', '$publication_year')";

    // Execute the query
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
        // Redirect back to the main page to show the new data
        header("Location:showbook_admin.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>