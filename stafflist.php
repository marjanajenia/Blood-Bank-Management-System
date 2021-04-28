<?php 
session_start();
if(!isset( $_SESSION["user"]))
       {
           header("Location:adminlogin.php");
       }
  include 'db.php';
  $query="select * from recep order by id DESC"; 
  $result=mysqli_query($conn,$query); 

?> 
<!DOCTYPE html> 
<html> 
	<head> 
		<title> Staff List </title> 
	    <link rel="stylesheet" type="text/css" href="css/header1.css">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
       <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

	</head> 
	<body> 
		<?php include 'header1.php' ?>		
	<<div class="container">
		<div class="col-lg-12">
			<h1 class="text-blue text-center">Staff List</h1>
			<table class="table table-striped table hover table-bordered">
				<tr class="bg-dark text-white text-center">
		
			  <th> Id</th>
			  <th> Name</th> 
			  <th> Email</th> 
			  <th> Username </th> 
			  <th> Gender </th>
			  <th> Password</th>
			  <th> Address </th>
			  <th> Blood group </th>
			  <th> Salary </th>
			  <th> Set Salary </th>
			  <th> Delete</th>			  
			  
		</tr> 
		
		<?php while($rows=mysqli_fetch_assoc($result)) 
		{ 
		?> 
		<tr> 
		<td><?php echo $rows['id']; ?></td> 
		<td><?php echo $rows['name']; ?></td> 
		<td><?php echo $rows['email']; ?></td> 
		<td><?php echo $rows['username']; ?></td>
		<td><?php echo $rows['gender']; ?></td> 
		<td><?php echo $rows['password']; ?></td> 
		<td><?php echo $rows['address']; ?></td> 
		<td><?php echo $rows['btype']; ?></td> 
		<td><?php echo $rows['salary']; ?></td> 
		<td><button class="btn btn-success"> <a href="setsalary.php?id=<?php echo $rows['id']; ?>"class="text-white">Set Salary</a></button></td>
		<td><button class="btn-danger btn "> <a href="delete.php?id=<?php echo $rows['id']; ?>"class="text-white">Delete</a></button></td>
		
		</tr> 
	     <?php 
               } 
          ?> 
      </table>
  </div>
</div>
</body>
</html>