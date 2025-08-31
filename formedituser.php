<html>
<head>
    <meta charset="UTF-8">
    <title>แก้ไขข้อมูล</title>
</head>
<body>
<?php

    $username = $_REQUEST['username'];
    $password = $_REQUEST['password'];
    $email = $_REQUEST['email'];
    $user_id = $_REQUEST['user_id'];
    $before =$user_id;

?>
<form action="edituser.php">
<center>
<table >
<?php
 echo "<caption><h2>แก้ไขข้อมูลนักศึกษา</h2></caption>
  <tr>
 <td>Username</td>
  <td><input type='hidden' name='before' value='$user_id'></td>
</tr>
 <tr>
 <td>Username</td>
  <td><input type='text' name='username' value='$username'></td>
</tr>
  <tr>
   <td>Password</td>
    <td><input type='text' name='password' value='$password'></td>
  </tr>
  <tr>
    <td>Email</td>
    <td><input type='text' name='email' value='$email'></td>
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