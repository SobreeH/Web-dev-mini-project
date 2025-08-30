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
                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                </div>

                <!-- Register button -->
                <button type="submit" class="btn btn-primary">Register</button>
            </form>

        </div>
    </div>

</body>
</html>