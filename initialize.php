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
        list_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        user_id INT(6) UNSIGNED,
        book_id INT(6) UNSIGNED,
        status VARCHAR(20),
        added_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (user_id) REFERENCES users(user_id),
        FOREIGN KEY (book_id) REFERENCES books(book_id)
        )";
    
    // create table reading_list
    if ($conn->query($createTableReadingList) === TRUE) {
      echo "Table reading_list created successfully";
    } else {
      echo "Error creating table: " . $conn->error;
    }
    echo "<br>";
       

 

        // add sample books
      $result = $conn->query("SELECT COUNT(*) as count FROM books");
      $row = $result->fetch_assoc();
        if ($row['count'] == 0) {
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
      echo "<br>";
    } else {
      echo "Books already exist in the database.";
      echo "<br>";
    }
    $result->close();


    // add admin user
    $result = $conn->query("SELECT COUNT(*) as count FROM users WHERE username='admin'");
    $row = $result->fetch_assoc();
    if ($row['count'] == 0) {
    $admin = "INSERT INTO users (username, password, email) VALUES ('admin', '123456', 'example@example.com')";
    if ($conn->query($admin) === TRUE) {
      echo "Admin user created successfully";
    } else {
      echo "Error creating admin user: " . $conn->error;
}
    } else {
      echo "Admin user already exists.";
    }
    echo "<br>";
    $result->close();


    //add sample users
    $sampleUsers = [
      ['sobree', '123456', 'sobree@example.com'],
      ['boom', '123456', 'boom@example.com'],
      ['sarinya', '123456', 'sarinya@example.com']
    ];

    foreach ($sampleUsers as $user) {
      $result = $conn->query("SELECT COUNT(*) as count FROM users WHERE username='" . $user[0] . "'");
      $row = $result->fetch_assoc();
      if ($row['count'] == 0) {
        $stmt = $conn->prepare("INSERT INTO users (username, password, email) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $user[0], $user[1], $user[2]);
        if ($stmt->execute() === TRUE) {
          echo "Sample user " . $user[0] . " created successfully.<br>";
        } else {
          echo "Error creating user " . $user[0] . ": " . $conn->error . "<br>";
        }
        $stmt->close();
      } else {
        echo "User " . $user[0] . " already exists.<br>";
      }
      $result->close();
    }

    // add sample reading list entries
    $readingListEntries = [
      ['sobree', 'The Great Gatsby', 'Reading'],
      ['boom', 'The Catcher in the Rye', 'Reading'],
      ['sarinya', '1984', 'Reading'],
      ['sobree', 'To Kill a Mockingbird', 'Completed'],
      ['boom', '1984', 'Completed'],
      ['sarinya', 'Pride and Prejudice', 'Wishlist']
    ];

    foreach ($readingListEntries as $entry) {
      $userResult = $conn->query("SELECT user_id FROM users WHERE username='" . $entry[0] . "'");
      $bookResult = $conn->query("SELECT book_id FROM books WHERE title='" . $entry[1] . "'");

      if ($userResult->num_rows > 0 && $bookResult->num_rows > 0) {
        $userRow = $userResult->fetch_assoc();
        $bookRow = $bookResult->fetch_assoc();

        $stmt = $conn->prepare("INSERT INTO reading_list (user_id, book_id, status) VALUES (?, ?, ?)");
        $stmt->bind_param("iis", $userRow['user_id'], $bookRow['book_id'], $entry[2]);

        if ($stmt->execute() === TRUE) {
          echo "Reading list entry for user " . $entry[0] . " and book " . $entry[1] . " added successfully.<br>";
        } else {
          echo "Error adding reading list entry for user " . $entry[0] . " and book " . $entry[1] . ": " . $conn->error . "<br>";
        }
        $stmt->close();
      } else {
        echo "User or book not found for entry: " . $entry[0] . " - " . $entry[1] . ".<br>";
      }

      $userResult->close();
      $bookResult->close();
    }
}
header("Location: login.php");
exit();
?>