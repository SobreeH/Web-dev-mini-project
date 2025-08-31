<?php
include 'db.php';
echo "<br>";

// Create database
$sql = "CREATE DATABASE IF NOT EXISTS bookmarker";
if ($conn->query($sql) === TRUE) {
  echo "Database created successfully";
} else {
  echo "Error creating database: " . $conn->error;
}
echo "<br>";

// Select the database
if ($conn->select_db("bookmarker")) {

    // sql to create table users
    $createTableUsers = "CREATE TABLE IF NOT EXISTS users (
        user_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(30) NOT NULL UNIQUE,
        password VARCHAR(255) NOT NULL,
        email VARCHAR(50),
        register_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP 
        )";

    // create table users
    if ($conn->query($createTableUsers) === TRUE) {
      echo "Table users created successfully";
    } else {
      echo "Error creating table: " . $conn->error;
    }
    echo "<br>";

    // sql to create table books
    $createTableBooks = "CREATE TABLE IF NOT EXISTS books (
        book_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        title VARCHAR(100) NOT NULL,
        author VARCHAR(100),
        genre VARCHAR(50),
        publication_year INT(4)
        )";

    // create table books
    if ($conn->query($createTableBooks) === TRUE) {
      echo "Table books created successfully";
    }
      else {
        echo "Error creating table: " . $conn->error;
      }
    echo "<br>";
    
    // sql to create table reading_list
    $createTableReadingList = "CREATE TABLE IF NOT EXISTS reading_list (
        user_id INT(6) UNSIGNED,
        book_id INT(6) UNSIGNED,
        status VARCHAR(20),
        added_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        PRIMARY KEY (user_id, book_id),
        FOREIGN KEY (user_id) REFERENCES users(user_id) ON DELETE CASCADE,
        FOREIGN KEY (book_id) REFERENCES books(book_id) ON DELETE CASCADE
        )";
    
    // create table reading_list
    if ($conn->query($createTableReadingList) === TRUE) {
      echo "Table reading_list created successfully";
    } else {
      echo "Error creating table: " . $conn->error;
    }
    echo "<br>";

        // add sample books
    $books = [
        ['The Great Gatsby', 'F. Scott Fitzgerald', 'Fiction', 1925],
        ['To Kill a Mockingbird', 'Harper Lee', 'Fiction', 1960],
        ['1984', 'George Orwell', 'Dystopian', 1949],
        ['Pride and Prejudice', 'Jane Austen', 'Romance', 1813],
        ['The Catcher in the Rye', 'J.D. Salinger', 'Fiction', 1951]
    ];
    for ($i = 0; $i < count($books); $i++) {
        $stmt = $conn->prepare("INSERT INTO books (title, author, genre, publication_year) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("sssi", $books[$i][0], $books[$i][1], $books[$i][2], $books[$i][3]);
        if ($stmt->execute() === TRUE) {
            echo "New record created successfully";
        }
        $stmt->close();
    }



    // add admin user
    $admin = "INSERT INTO users (username, password, email) VALUES ('admin', '123456', 'example@example.com')";
    if ($conn->query($admin) === TRUE) {
      echo "Admin user created successfully";
    } else {
      echo "Error creating admin user: " . $conn->error;
}
}
header("Location: login.php");
exit();
?>