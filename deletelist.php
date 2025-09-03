<?php
    include "db.php";
    session_start();

    // Check if the user is logged in
    if (!isset($_SESSION['username'])) {
        echo "<center>You must be logged in to delete a book.</center>";
        echo "<center><a href='login.php'>Go to Login</a></center>";
        exit();
    }

    $username = $_SESSION['username'];
    $dbname = "bookmarker";
    
    // Select the database
    if(!$conn->select_db($dbname)){
        echo "Error selecting database: " . $conn->error;
        exit();
    }

    if (isset($_GET['list_id'])) {
        $list_id = $_GET['list_id'];

        try {
            // Get user_id from username to verify ownership
            $stmt_user = $conn->prepare("SELECT user_id FROM users WHERE username = ?");
            $stmt_user->bind_param("s", $username);
            $stmt_user->execute();
            $result_user = $stmt_user->get_result();
            $user_row = $result_user->fetch_assoc();
            $user_id = $user_row['user_id'];
            $stmt_user->close();

            // Use a prepared statement to safely delete the list item
            $stmt_delete = $conn->prepare("DELETE FROM reading_list WHERE list_id = ? AND user_id = ?");
            $stmt_delete->bind_param("ii", $list_id, $user_id);
            
            if ($stmt_delete->execute()) {
                if ($stmt_delete->affected_rows > 0) {
                    echo "<center>Book successfully removed from your reading list!</center>";
                } else {
                    echo "<center>No book found with that ID for your user account.</center>";
                }
            } else {
                echo "<center>Error deleting book: " . $stmt_delete->error . "</center>";
            }
            $stmt_delete->close();
        } catch (mysqli_sql_exception $exception) {
            echo "<center>Error: " . $exception->getMessage() . "</center>";
        }
    } else {
        echo "<center>No list ID provided.</center>";
    }

    echo "<center><a href='show_reading_list.php'>Back to Reading List</a></center>";
    $conn->close();
?>