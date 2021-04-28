<?php 
session_start();
/*if(!isset( $_SESSION["user"]))
       {
           header("Location:adminlogin.php");
       }*/
  include 'db.php';
  $query="select * from intven "; 
  $result=mysqli_query($conn,$query); 

?> 
<!DOCTYPE html> 
<html> 
	<head> 
		<title> update inventory </title> 
	    <link rel="stylesheet" type="text/css" href="css/header1.css">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
       <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

	</head> 
	<body> 
		<?php include 'header1.php' ?>		
	<div class="container">
		<div class="col-lg-12">
			<h1 class="text-warning text-center">Update Inventory</h1>
			<table class="table table-striped table hover table-bordered">
				<tr class="bg-dark text-white text-center">

		      <th> ID </th>
			  <th> Blood Group</th>
			  <th> Quantity</th> 
			  <th> Add</th> 
			  <th> Sub </th> 			  
			  
		</tr> 
		
		<?php while($rows=mysqli_fetch_assoc($result)) 
		{ 
		?> 
		<tr> 
		<td><?php echo $rows['id']; ?></td> 
		<td><?php echo $rows['btype']; ?></td> 
		<td><?php echo $rows['quantity']; ?></td>  
		<td><button class="btn btn-success"> <a href="add.php?id=<?php echo $rows['id']; ?>"class="text-white">Add</a></button></td>
		<td><button class="btn-danger btn "> <a href="sub.php?id=<?php echo $rows['id']; ?>"class="text-white">Sub</a></button></td>
		
		</tr> 
	     <?php 
               } 
          ?> 
      </table>
  </div>
</div>
</body>
</html>