<?php
    include "db.php";
    session_start();

    // Check if the user is logged in
    if (!isset($_SESSION['username'])) {
        echo "<center>You must be logged in to add a book.</center>";
        echo "<center><a href='login.php'>Go to Login</a></center>";
        exit();
    }

    $username = $_SESSION['username'];
    $book_id = $_POST['book_id'];
    $status = $_POST['status'];

    $dbname = "bookmarker";
    
    // Select the database
    if(!$conn->select_db($dbname)){
        echo "Error selecting database: " . $conn->error;
        exit();
    }

    try {
        // Get user_id from username
        $stmt_user = $conn->prepare("SELECT user_id FROM users WHERE username = ?");
        $stmt_user->bind_param("s", $username);
        $stmt_user->execute();
        $result_user = $stmt_user->get_result();
        $user_row = $result_user->fetch_assoc();
        $user_id = $user_row['user_id'];
        $stmt_user->close();

        if ($user_id) {
            // Use a prepared statement to prevent SQL injection
            $stmt = $conn->prepare("INSERT INTO reading_list (user_id, book_id, status) VALUES (?, ?, ?)");
            $stmt->bind_param("iis", $user_id, $book_id, $status);
            
            if ($stmt->execute()) {
                echo "<center>New book added to your reading list successfully!</center>";
            } else {
                echo "<center>Error adding book: " . $stmt->error . "</center>";
            }
            $stmt->close();
        } else {
            echo "<center>User not found.</center>";
        }

    } catch (mysqli_sql_exception $exception) {
        echo "<center>Error: " . $exception->getMessage() . "</center>";
    }

    echo "<center><a href='show_reading_list.php'>Back to Reading List</a></center>";

    $conn->close();
?>