<?php
include 'db.php';
session_start();
if (isset($_GET['error'])) {
                // Display the error message in a styled alert box
                echo '<div class="alert alert-danger" role="alert">';
                echo htmlspecialchars($_GET['error']);
                echo '</div>';
            }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>
<div class="container d-flex justify-content-center align-items-center min-vh-100">
        <!-- A single block to contain the form, title, and link -->
        <div class="text-center">
            <h2>Login</h2>
            <form action="login.php" method="post">
                <!-- Username field -->
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" name="username" class="form-control" placeholder="Username" required>
                </div>
                
                <!-- Password field -->
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                </div>

                <!-- Login button -->
                <input type="submit" name="login" class="btn btn-primary" value="Login">
            </form>

            <!-- "Register here" link -->
            <a href="register.php" class="text-primary mt-3">Don't have an account? Register here</a>
        </div>
    </div>
<div> <H1>For testing purpose we will be using the usernames below as sample users and admin</H1>
        <table class="table">
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Password</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>admin</td>
                    <td>123456</td>
                </tr>
                <tr>
                    <td>sobree</td>
                    <td>123456</td>
                </tr>
                <tr>
                    <td>boom</td>
                    <td>123456</td>
                </tr>
                <tr>
                    <td>sarinya</td>
                    <td>123456</td>
                </tr>
            </tbody>
        </table>
</div>
</body>
</html>

<?php

if (isset($_POST["login"])) {
    $_SESSION['username'] = $_POST['username'];
    $_SESSION['password'] = $_POST['password'];
    
    echo $_SESSION['username'];
    echo $_SESSION['password'];

    header("Location: authenticate-user.php");
    exit();

}

?>