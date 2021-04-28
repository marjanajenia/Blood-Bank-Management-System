<?php 
     
    include'db.php';
   
  $firstnameerr = $lastnameerr=$gendererr =$addresserr= $btypeerr = $patternerrf = $patternerrl =$usernameerr= $wrongemail=$passworderr = $notavailable =" " ;
  $Firstname=$lname=$gender=$address=$btype=$username=$password=$email="";
  
 if($_SERVER['REQUEST_METHOD']=="POST"){
 
 	         if(empty($_POST['fname'])) {
                    $firstnameerr = "Please Fill up the firstname!";
                }
                else if(!preg_match("/^[a-zA-Z]*$/", ($_POST['fname']) )){
                    $patternerrf = "only letter allowed in Firstname";
              }

              if(empty($_POST['lname'])) {                    
                    $lastnameerr = "Please Fill up the lastname!";
                    
                }

              else if(!preg_match("/^[a-zA-Z]*$/", ($_POST['lname']) )){
                    $patternerrl = "only letter allowed in lastname";
              }

              if(empty($_POST['gender'])) {                    
                    $gendererr = "Please Fill up the gender!";
                    
              }
              if(empty($_POST['address'])) {                    
                    $addresserr = "Please Fill up the address!";
                    
              }
              if(empty($_POST['btype'])) {                    
                    $btypeerr = "Please Fill up the blood group!";
                    
              }
              if(empty($_POST['username'])) {                    
                    $usernameerr = "Please Fill up the username!";
                    
              }

              if(empty($_POST['password'])) {                    
                    $passworderr = "Please Fill up the gender!";
                    
              }

              if(!filter_var(($_POST['email']),FILTER_VALIDATE_EMAIL)){
                  $wrongemail="invalid email";
              }
              else{

            $Firstname=$_POST['fname'];
 	          $lastname= $_POST['lname'];
 	          $username=$_POST['username'];
 	          $gender=$_POST['gender'];
 	          $address=$_POST['address'];
 	          $password=$_POST['password'];
 	          $bloodtype=$_POST['btype'];
 	          $email=$_POST['email'];

            
            $SELECT="SELECT username from admin where username = ? limit 1";
            $INSERT="INSERT Into admin (fname,lname,gender,address,btype,username,password,email) values(?,?,?,?,?,?,?,?)";

              //statement
              $stmt= $conn->prepare($SELECT);
              $stmt->bind_param("s", $username);
              $stmt->execute();
              $stmt->bind_result($username);
              $stmt->store_result();
              $rnum=$stmt->num_rows;

              if($rnum==0){
                $stmt=$conn->prepare($INSERT);
                $stmt->bind_param("ssssssss",$Firstname,$lastname,$gender,$address,$bloodtype,$username,$password,$email);
                $stmt->execute();
                header("Location:adminlogin.php");
              }
              else{
                $notavailable="Username already exit! use another one";
                }
              $stmt->close();
              $conn->close();
            }
          
        }

  
 	      
 	
 	
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Registration Form</title>
  <link rel="stylesheet" type="text/css" href="css/signup.css">
  <link rel="stylesheet" type="text/css" href="css/header.css">
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  

  <script type="text/javascript">
  function get(id){
    return document.getElementById(id);
  }
  function validateForm(){
    var fname =get("fname").value;
    var lname=get("lname").value;
    var gender=get("gender").value;
    var address=get("address").value;
    var btype=get("btype").value;
    var username= get("username").value;
    var password=get("password").value; 
    var email = get("email").value;
    var correctway=/^[A-Za-z]+$/;
    
    var firstnameerr = get("firstnameerr");
    var lastnameerr=get("lastnameerr");
    var gendererr=get("gendererr");
    var addresserr=get("addresserr");
    var btypeerr = get("btypeerr");
    var usernameerr = get("usernameerr");
    var passworderr =get("passworderr");
    var wrongemail=get("wrongemail");
    var has_error=true;
    if(fname=="")
    {
      firstnameerr.innerHTML ="Please Fill up the firstname!<br>";
      has_error=false;
    }
    if(fname.match(correctway))
    {
      has_error=true;
    }
      else
      {
        alart("only letters allowed in fname");
        return false;
      }
    

    if(lname =="")
    {
      lastnameerr.innerHTML = "Please Fill up the lastname!<br>";
      has_error=false;
    }
        
    if(gender=="")
    {
      gendererr= "Please Fill up the gender!<br>";
      has_error=false;
    }
    if(address=="")
    {
      addresserr= "Please Fill up the address!<br>";
      has_error=false;
    }

    if(btype=="")
    {
       btypeerr.innerHTML = "Please Fill up the blood group!<br>";
      has_error=false;
    }

    if(username=="")
    {
      usernameerr.innerHTML= "Please Fill up the username!<br>";
      has_error=false;
    }

    if(password=="")
    {
      passworderr.innerHTML = "Please Fill up the password!<br>";
      has_error=false;
    }

    if(email=="")
    {
      wrongemail.innerHTML= "Please Fill up the email!<br>";
      has_error=false;
    }
    return has_error;
  }
  
</script>
</head>
<body>
	<?php include'header.php' ?>
	<form action="adminsignup.php" method="POST" onsubmit="return validateForm()" >

      <h1>Registration</h1>

      <level>First Name</level>
		    <input type="text" id="fname"name="fname"autocomplete="off">
        <?php echo"<div class='error'>". $firstnameerr."</div>"; echo"<div class='error'>". $patternerrf ."</div>"; ?>
		   

      <level>Last Name</level>
		    <input type="text" id="lname"name="lname"autocomplete="off">
        <?php echo"<div class='error'>". $lastnameerr ."</div>";echo"<div class='error'>". $patternerrl."</div>"; ?>
		   
      <leve>Gender</leve>
        <select name="gender" id="gender">
          <option value=""></option>  
          <option value="male">male</option>
          <option value="female">Female</option>
        </select>
        <?php echo"<div class='error'>". $gendererr."</div>"; ?>
       
      
      <br>
       
        <level>Address</level>
        <input type="text" id="address"name="address"autocomplete="off">
        <?php echo"<div class='error'>". $addresserr."</div>"; ?>
        

        <level>Blood Group :</level>        
         <select name="btype" id="btype">
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

      
       

      <level>User Name</level>
		    <input type="text" id="username"name="username"autocomplete="off">
        <?php echo"<div class='error'>". $usernameerr."</div>";echo"<div class='error'>". $notavailable."</div>"; ?>
		   

      <level>Password</level>      
		    <input type="password" id="password"name="password"autocomplete="off">
         <?php echo"<div class='error'>". $passworderr."</div>"; ?>
                
      <level>Email</level>
		    <input type="email" id="email"name="email"autocomplete="off">
		    <?php echo"<div class='error'>". $wrongemail."</div>"; ?>
      <input type="submit" name="submit" value="signup">
     


	</form>

</body>
</html>