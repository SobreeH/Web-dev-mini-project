<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Insert New Book</title>
</head>
<body>
    <center>
        <h2>Insert New Book</h2>
        <form action="insertbook.php" method="post">
            Title: <input type="text" name="title"><br><br>
            Author: <input type="text" name="author"><br><br>
            Genre: <input type="text" name="genre"><br><br>
            Publication Year: <input type="text" name="publication_year"><br><br>

            <input type="submit" value="Add Book">
        </form>
        <a href="showbook-admin.php">Back</a>
    </center>
</body>
</html>