<?php
session_start();
if(!isset( $_SESSION["user"]))
       {
           header("Location:adminlogin.php");
       }
   include 'db.php';
    $salaryerr= $patternerr="";
      if($_SERVER['REQUEST_METHOD']=="POST"){
         if(empty($_POST['salary'])) {                    
            $salaryerr = "Please Fill up the salary!";                    
          }
          else if(!preg_match("/^[0-9]*$/", ($_POST['salary']) )){
                    $patternerr = "only number allowed in salary";
              }
         
       else{

           $sal=$_POST['salary'];
  
           $id = $_GET['id'];
           $sql = " UPDATE recep SET salary = '$sal' WHERE id = '$id' ";
           mysqli_query($conn,$sql);
           $conn->close();
           header('location:stafflist.php');
           }
         }


  ?>
  <!DOCTYPE html>
  <html>
  <head>
  	<title>set salary</title>
    <link rel="stylesheet" type="text/css" href="css/salary.css">
   
  </head>
  <body>
  	
        <div class="con">   
        <form action="" method="POST">
              
            <input type="text" name="salary" id="salary"placeholder="enter the salary"autocomplete="off">
             <?php echo"<div class='error'>". $salaryerr ."</div>";echo"<div class='error'>". $patternerr ."</div>"; ?>
       
        <input type="submit" value="submit">
</form> 
</div>

 </body>
 </html>