<?php
session_start();
if(!isset( $_SESSION["user"]))
       {
           header("Location:adminlogin.php");
       }
   include 'db.php';
  /*if(isset($_POST['submit'])) {*/
    $id = $_GET['id'];

    $q = " DELETE  FROM complain WHERE id = '$id' ";

  mysqli_query($conn,$q);
 //$conn->close();
  header('location:complain.php');


?>
<!--<!DOCTYPE html>
<html>
<head>
	<title>delete</title>
	<link rel="stylesheet" type="text/css" href="css/delete.css">
</head>
<body>
	<form action="" method="POST">
	<h1>Do you wanna delete it?</h1>
	 <input type="submit" name="login"value="Yes">
	<button class="no "><a href="complain.php"><div class="no">no</div></a></button>
	
		
	</form>
</body>
</html>