<?php
include'db.php';
if($_SERVER['REQUEST_METHOD']=="POST"){
	$b=$_POST['btype'];
	$q=$_POST['quantity'];
	$SELECT="SELECT * from intven";
	$INSERT="INSERT Into intven (btype,quantity) values(?,?)";

                $stmt=$conn->prepare($INSERT);
                $stmt->bind_param("si",$b,$q);
                $stmt->execute();
                
              
              
              $stmt->close();
              $conn->close();
          }

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form action="" method="POST">
	<level>btype</level>
	<input type="text"id="btype"name="btype">
	<br>
	<level>quantity</level>
	<input type="number"id="quantity"name="quantity">
	<br>
	<input type="submit" value="submit">
</form>



</body>
</html>