<?php
include 'db.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>
<div class="container d-flex justify-content-center align-items-center min-vh-100">
        <!-- A single block to contain the form, title, and link -->
        <div class="text-center">
            <h2>Book</h2>
            <form action="booktable.php" method="POST">
                <!-- Username field -->
                <div class="mb-3">
                    <label for="title" class="form-label">title</label>
                    <input type="text" name="title" class="form-control" placeholder="title" required>
                </div>
                
                <!-- author field -->
                <div class="mb-3">
                    <label for="author" class="form-label">author</label>
                    <input type="text" name="author" class="form-control" placeholder="author" required>
                </div>

                
                <!-- genre field -->
                <div class="mb-3">
                    <label for="genre" class="form-label">genre</label>
                    <input type="text" name="genre" class="form-control" placeholder="genre" required>
                </div>

                
                <!-- year field -->
                <div class="mb-3">
                    <label for="year" class="form-label">year</label>
                    <input type="number" name="publication_year" class="form-control" placeholder="year" required>
                </div>

                <!-- Register button -->
                <button type="submit" class="btn btn-primary">OK</button>

            </form>

        </div>
    </div>
    

</body>
</html>