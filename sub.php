<?php
session_start();
if(!isset( $_SESSION["user"]))
       {
           header("Location:adminlogin.php");
       }
   include 'db.php';
    $error= "";
      if($_SERVER['REQUEST_METHOD']=="POST"){
         if(empty($_POST['quantity'])) {                    
            $error = "Please Fill up the quantity!";                    
          }
        
       else{

           $quantity =$_POST['quantity'];
  
           $id = $_GET['id'];
           $sql = " UPDATE intven SET quantity = quantity-$quantity WHERE id = '$id' ";
           mysqli_query($conn,$sql);
           $conn->close();
           header('location:manageinventory.php');
           }
         }


  ?>
  <!DOCTYPE html>
  <html>
  <head>
  	<title>set salary</title>
    <link rel="stylesheet" type="text/css" href="css/update.css">
   
  </head>
  <body>       
        <form action="" method="POST">            
          <table> 
          <tr>
             <td>Sub</td> 
              <td><input type="number" name="quantity" id="quantity"></td>
             <?php echo"<div class='error'>". $error ."</div>";?>
           </tr>
         </table>       
        <button class="btn-danger btn "><input type="submit" value="submit"></button>        
      </form> 
</body>
</html>