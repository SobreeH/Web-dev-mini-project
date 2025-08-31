<html>
<head>
    <meta charset="UTF-8">
    <title>แก้ไขข้อมูล</title>
</head>
<body>
<?php

    $title = $_REQUEST['title'];
    $author = $_REQUEST['author'];
    $genre = $_REQUEST['genre'];
    $publication_year = $_REQUEST['publication_year'];
    $book_id =$_REQUEST['book_id'];
    $before =$book_id;
	

?>
<form action="editbook.php">
<center>
<table >
<?php
 echo "<caption><h2>แก้ไขข้อมูลนักศึกษา</h2></caption>
  <tr>
 <td></td>
  <td><input type='hidden' name='before' value='$book_id'></td>
</tr>
 <tr>
 <td>Title</td>
  <td><input type='text' name='title' value='$title'></td>
</tr>
  <tr>
   <td>Author</td>
    <td><input type='text' name='author' value='$author'></td>
  </tr>
  <tr>
    <td>Genre</td>
    <td><input type='text' name='genre' value='$genre'></td>
  </tr>
  <tr>
    <td>Year</td>
    <td><input type='text' name='publication_year' value='$publication_year'></td>
  </tr>
  <tr>
    <td></td>
    <td><input type='submit' value='แก้ไขข้อมูล'> <input type='reset' value='ยกเลิก'></td>
  </tr>
  <tr>
    <td></td>
    <td><a href='showuser.php'>[ย้อนกลับ]</a></td>
  </tr>";
  
  ?>
</table>
</center>
</form>
</body>
</html>