<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

</head>
<body>
    <header class="masthead d-flex align-items-center">
        <div class="container px-4 px-lg-5 text-center">
            <h1 class="mb-1">Welcome to the BookMARKER pre-alpha</h1>
            <h3 class="mb-5"><em> </em></h3>
            <a class="btn btn-primary btn-xl" href="showbook_admin.php" >Book table</a>
            <a class="btn btn-primary btn-xl" href="showuser.php" >User table</a>
        <form action="admin-page.php" method="post">
        <input type="submit" name="logout" value="Logout" ;>
        </form>
        </div>

    </header>
</body>
</html>
<?php
if (isset($_POST["logout"])) {
    session_destroy();
    header("Location: login.php");
    exit();
}