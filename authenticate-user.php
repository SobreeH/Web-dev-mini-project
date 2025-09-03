<?php
include 'db.php';
session_start();

$username = $_SESSION['username'];
$password = $_SESSION['password'];
$conn->select_db("bookmarker");
// Prepare and bind
$stmt = $conn->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
$stmt->bind_param("ss", $username, $password);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows === 1) {
    // User authenticated successfully
    $user = $result->fetch_assoc();
    if ($user['username'] === 'admin') {
        // Redirect to admin page
        header("Location: admin-page.php");
        exit();
    } else {
        // Redirect to user page
        header("Location: user-page.php");
        exit();
    }
} else {
    // Authentication failed, redirect back to login with error
    header("Location: login.php?error=Invalid credentials");
    exit();
}

?>
