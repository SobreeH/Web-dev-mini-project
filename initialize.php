<?php
include 'db.php';

// Create database
$sql = "CREATE DATABASE IF NOT EXISTS bookmarker";
if ($conn->query($sql) === TRUE) {
  echo "Database created successfully";
} else {
  echo "Error creating database: " . $conn->error;
}


// Select the database
if ($conn->select_db("bookmarker")) {

// sql to create table users
$createTableUsers = "CREATE TABLE IF NOT EXISTS users (
    user_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(50),
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP 
    )";

// create table users
if ($conn->query($createTableUsers) === TRUE) {
  echo "Table users created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

// sql to create table books
$createTableBooks = "CREATE TABLE IF NOT EXISTS books (
    book_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(100) NOT NULL,
    author VARCHAR(100),
    genre VARCHAR(50),
    publication_year INT(4)    )";

// create table books
if ($conn->query($createTableBooks) === TRUE) {
  echo "Table books created successfully";
}
  else {
    echo "Error creating table: " . $conn->error;
  }

// sql to create table reading_list
$createTableReadingList = "CREATE TABLE IF NOT EXISTS reading_list (
    list_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT(6) UNSIGNED,
    book_id INT(6) UNSIGNED,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (book_id) REFERENCES books(id) ON DELETE CASCADE
    )";
  } 

?>