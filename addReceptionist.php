<?php
   session_start();
      if(!isset( $_SESSION["user"]))
       {
           header("Location:adminlogin.php");
       }
     include'db.php';
     $nameerr =$patternerr = $usernameerr  = $passworderr = $addresserr = $emailerr =$gendererr = $btypeerr = $salaryerr=$notavailable = " " ;


 if($_SERVER['REQUEST_METHOD']=="POST"){

 	           if(empty($_POST['name'])) {
                    $nameerr = "Please Fill up the name!";
                }
                else if(!preg_match("/^[a-zA-Z]*$/", ($_POST['name']) )){
                    $patternerr = "only letter allowed in name";
                }

             
             if(!filter_var(($_POST['email']),FILTER_VALIDATE_EMAIL)){
                  $emailerr="invalid email";
              }

             if(empty($_POST['username'])) {                    
                    $usernameerr = "Please Fill up the username!";
                }

              if(empty($_POST['gender'])) {                    
                    $gendererr = "Please Fill up the gender!";                    
                }

              if(empty($_POST['password'])) {                    
                    $passworderr = "Please Fill up the password!";
                }
               

              if(empty($_POST['address'])) {                    
                    $addresserr = "Please Fill up the address!";
                }
              if(empty($_POST['btype'])) {                    
                    $btypeerr = "Please Fill up the blood group!";
                    
              }
              if(empty($_POST['salary'])) {                    
                    $salaryerr = "Please Fill up the salary!";
                    
              }                             
      else
             {
 	          $name= $_POST['name']; 
            $email=$_POST['email'];	          
 	          $username=$_POST['username']; 
            $gender=$_POST['gender'];	          	          
 	          $password=$_POST['password'];
            $address=$_POST['address'];	          
 	          $bloodtype=$_POST['btype'];
            $salary=$_POST['salary'];
              
              $SELECT="SELECT username from recep where username = ? limit 1";
              $INSERT="INSERT Into recep (name,email,username,gender,password,address,btype,salary) values(?,?,?,?,?,?,?,?)";

              //statement
              $stmt= $conn->prepare($SELECT);
              $stmt->bind_param("s", $username);
              $stmt->execute();
              $stmt->bind_result($username);
              $stmt->store_result();
              $rnum=$stmt->num_rows;

              if($rnum==0){
                $stmt=$conn->prepare($INSERT);
                $stmt->bind_param("sssssssi",$name,$email,$username,$gender,$password,$address,$bloodtype,$salary);
                $stmt->execute();
                header("Location:adminhomepage.php");
              }
              else{
               $notavailable= "user name already exit!try something new";
                }
              $stmt->close();
              $conn->close();
 	    }
 	}

?>

<html>
<head>
	<title>Registration Form</title>
  <link rel="stylesheet" type="text/css" href="css/recep.css">
  <link rel="stylesheet" type="text/css" href="css/header1.css">
</head>
<body>
  <?php include'header1.php' ?>
	
	<form action="" method="POST">
    <h1>Add Receptionist</h1>
    
  

		<level> Name</level>
		  <input type="text" id="name"name="name"autocomplete="off">
		  <?php echo"<div class='error'>". $nameerr."</div>"; echo"<div class='error'>". $patternerr ."</div>"; ?>
    <br>
  
    <level>Email</level>
      <input type="email" id="email"name="email"autocomplete="off">
     <?php echo"<div class='error'>". $emailerr."</div>"; ?>
    <br>
    <level>User Name</level>
		  <input type="text" id="username"name="username"autocomplete="off">
		  <?php echo"<div class='error'>". $usernameerr."</div>";echo"<div class='error'>". $notavailable."</div>"; ?>
      <br>
    <level>Gender</level>
        <select name="gender" id="gender"autocomplete="off">
          <option value=""></option>  
          <option value="male">male</option>
          <option value="female">Female</option>
        </select>
       <?php echo"<div class='error'>". $gendererr."</div>"; ?>
     <br>
   <level>Password</level>
        <input type="password" id="password"name="password"autocomplete="off">
        <?php echo"<div class='error'>". $passworderr."</div>"; ?>
        <br>
   <level>Address</level>
		<input type="text" id="address"name="address"autocomplete="off">
		<?php echo"<div class='error'>". $addresserr."</div>"; ?>
    <br>
	<level>Blood Group :</level>
        
          <select name="btype" id="btype"autocomplete="off">
          <option value=""></option>  
          <option value="O+">O+</option>
          <option value="O-">O-</option>
          <option value="A+">A+</option>
          <option value="A-">A-</option>
          <option value="B+">B+</option>
          <option value="B-">B-</option>
          <option value="AB+">AB+</option>
          <option value="AB-">AB-</option>      
          </select>
  
       <?php echo"<div class='error'>". $btypeerr."</div>"; ?>
       <br>
       <level>salary</level>
    <input type="text" id="salary"name="salary"autocomplete="off">
    <?php echo"<div class='error'>". $salaryerr."</div>"; ?>
    <br>
  
 
		<input type="submit" value="submit">
    
 

</form>

</body>
</html>