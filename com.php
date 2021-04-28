<?php
include'db.php';
if($_SERVER['REQUEST_METHOD']=="POST"){
	$c=$_POST['complain'];
	$SELECT="SELECT * from complain";
	$INSERT="INSERT Into complain (complain) values(?)";

                $stmt=$conn->prepare($INSERT);
                $stmt->bind_param("s",$c,);
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
	<level>complain</level>
	<input type="text"id="complain"name="complain">
	<br>
	
	<input type="submit" value="submit">
</form>



</body>
</html>