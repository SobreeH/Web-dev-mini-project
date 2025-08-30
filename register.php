<?php
include 'db.php';

// add user staetement
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($conn ->select_db("bookmarker") == "TRUE") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    $stmt = $conn->prepare("INSERT INTO users (username, password, email) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $password, $email);

    if ($stmt->execute()) {
        echo "New record created successfully";
        header("Location: login.php"); // Redirect to login page after successful registration
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();

    // create reading-list table for new user
    $tableName = $username . "_reading_list";
    $createTableReadingList = "CREATE TABLE IF NOT EXISTS $tableName (
        entry_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        book_id INT(6) UNSIGNED,
        status VARCHAR(20),
        added_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (book_id) REFERENCES books(book_id)
    )";

}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>
<div class="container d-flex justify-content-center align-items-center min-vh-100">
        <!-- A single block to contain the form, title, and link -->
        <div class="text-center">
            <h2>Register</h2>
            <form action="register.php" method="POST">
                <!-- Username field -->
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" name="username" class="form-control" placeholder="Username" required>
                </div>
                
                <!-- Password field -->
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Password" minlength="6" required>
                </div>

                <div>
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Email" required>
                </div>
                <!-- Register button -->
                <button type="submit" class="btn btn-primary">Register</button>
            </form>

        </div>
    </div>

</body>
</html>