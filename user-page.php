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
            <?php
                echo "<h1>Welcometo the BookMARKER pre-alpha, " . htmlspecialchars($_SESSION['username']) . "!</h1>";
                ?>
            
            <h3 class="mb-5"><em> </em></h3>
            <a class="btn btn-primary btn-xl" href="showbook-user.php" >Book table</a>
            <a class="btn btn-primary btn-xl" href="show_reading_list.php" >Show Reading list</a>
            <form action="user-page.php" method="post">
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
?>