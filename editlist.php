<?php
    include "db.php";
    session_start();

    $list_id = $_POST['list_id'];
    $book_id = $_POST['book_id'];
    $status = $_POST['status'];
    $dbname = "bookmarker";
    
    if(!$conn->select_db($dbname)){
        echo "Error selecting database: " . $conn->error;
        exit();
    }

    try {
        // Update the 'reading_list' table
        $stmt_list = $conn->prepare("
            UPDATE reading_list 
            SET book_id = ?, status = ?
            WHERE list_id = ?
        ");
        $stmt_list->bind_param("isi", $book_id, $status, $list_id);
        $stmt_list->execute();
        $stmt_list->close();

        echo "<center>Record updated successfully!</center>";

    } catch (mysqli_sql_exception $exception) {
        echo "<center>Error updating record: " . $exception->getMessage() . "</center>";
    }

    echo "<center><a href='show_reading_list.php'>Back to Reading List</a></center>";

    $conn->close();
?>