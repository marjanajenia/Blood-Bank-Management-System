<?php
session_start();
if(!isset( $_SESSION["user"]))
       {
           header("Location:adminlogin.php");
       }
 include'db.php';
$passerr=$npasserr=$cpasserr=$error="";


if($_SERVER['REQUEST_METHOD']=="POST"){
              if(empty($_POST['password'])) {                     
                $passerr = "Fill up the current password!"; 
                

              } 
               else if(empty($_POST['npass'])) {                    
                    $npasserr = "Fill up the new password!";
                    
              } 
               else if(empty($_POST['cpass'])) {                    
                    $cpasserr = "Fill up the confirm password!";
                    
              } 
              else{

                 
                 $id = $_SESSION['user'];
                 $pass = $_POST['password'];
                 $npass=$_POST["npass"];
                 $cpass=$_POST["cpass"];

                $query = "SELECT * FROM Admin WHERE username = '$id' and password = '$pass'";
                 $result = mysqli_query($conn,$query);
            
                 if(mysqli_num_rows($result)>0){

                    if($npass !=$cpass){
                      $error="Password doesn't Match";
                      }
                    else{
                        $sql = " UPDATE admin SET password = '$npass' WHERE username = '$id' ";
                         mysqli_query($conn,$sql);
                         session_destroy();
                         header('location:adminlogin.php');
                      }               
                   }
                   else{
                     $error= "wrong password";
                   }
           
            
              }
 }        	
?>
<!DOCTYPE html>
<html>
<head>
    <title>change password</title>
     <link rel="stylesheet" href="css/header1.css">
      <link rel="stylesheet" href="css/pass.css">
</head>
<body>
   <header>
  <?php include "header1.php"; ?> 
    
    <form action="" method="POST">
      <h1>Change Password</h1>
    <table>
     <tr>

        <td> Current Password</td>
        <td><input type="password" id="password"name="password"autocomplete="off"></td>
        <?php echo"<div class='error'>". $passerr ."</div>";echo"<div class='error'>". $error ."</div>";?>
       
    </tr>

    <tr>
        <td>New Password</td>
        <td><input type="password" id="npass"name="npass"autocomplete="off"></td>
        <?php echo"<div class='error'>". $npasserr ."</div>";?>
    </tr>
    <tr>
        <td>Confirm Password</td>
        <td><input type="password" id="cpass"name="cpass"autocomplete="off"></td>        
       <?php echo"<div class='error'>". $cpasserr ."</div>";?>
    </tr>
     </table>
        <input type="submit" value="submit">
  
   
    </form>
</body>
</html>