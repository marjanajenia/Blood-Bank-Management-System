<?php
     include'db.php';
     session_start();
    $usernameerr = $passworderr = $username = $password="";
    $has_error=false;

        if($_SERVER['REQUEST_METHOD'] == "POST") {
              if(empty($_POST['username'])) {                    
                    $usernameerr = " Fill up the username!";
                    $has_error=true;
                    
              }
              else{
                $username = $_POST['username'];               
                 
              }

             if(empty($_POST['password'])) {                    
                    $passworderr = "Fill up the password!";
                    $has_error=true;
                    
              }
              else
              {
                 
                 $password = $_POST['password'];
              }
              if(!$has_error){


                if( $l=authenticate($username,$password))

                 {
                   $_SESSION['user'] = $username;
                   setcookie("user",$username,time()+3600);
                   header('Location:adminhomepage.php');
                 }
                 else
                   {
                    $passworderr = "Incorect User name or password<br>";                 
                   }		
              }
        }
        function authenticate($username,$password){
        $query = "SELECT * From Admin WHERE username='$username' and password='$password'";
        $user=getArray($query);
        return $user;
        }
?>
<!DOCTYPE html>
<html>
<head>
	<title>login form</title>
  <link rel="stylesheet" type="text/css" href="css/login.css">
  <link rel="stylesheet" type="text/css" href="css/header.css">
  <script src="js/jquery-3.3.1.min.js"></script>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> -->
    <script src="js/popper.min.js"></script>
    
    <script src="js/plugins/pace.min.js"></script>
  <script type="text/javascript">
    function get(id){
    return document.getElementById(id);
  }
  function validateForm(){
    var username = get('username').value;
    var password = get("password").value;

    var usernameerr = get('usernameerr');
    var passworderr = get("passworderr");
    var has_error = true;
    if(username ==""){
       usernameerr.innerHTML ="Please Fill up the username!<br>";
      has_error = false;
    }
    if(password ==""){
      passworderr.innerHTML = "Please Fill up the password!<br>";
      has_error = false;
    }
    return has_error;
  }
  </script>
</head>  
               
<body>
 <header>
	<div class="title">
    <h1>BLOOD BANK MANAGEMENT SYSTEM</h1>  
  </div>
</header>

	<form action="" method="POST" onsubmit="return validateForm()" enctype ="multipart/form-data">
  <h1>LOGIN</h1>	
				<input type="text" name="username" id="username"placeholder="Enter the User Name"autocomplete="off"value="<?php echo $username ?>">
        <span id="usernameerr" style="color:red;"><?php echo $usernameerr ?></span>
        <?php /*echo"<div class='error'>". $usernameerr ."</div>";*/?>
        
        <input type="password" name="password" id="password" placeholder="Enter the password"autocomplete="off" value="<?php echo $password ?>">
        <span id="passworderr" style="color:red;"><?php echo $passworderr ?></span>
         <?php /*echo"<div class='error'>". $passworderr."</div>";*/?>

        <input type="submit" name="login"><br>
        <?php /* echo"<div class='error'>". $error."</div>";*/ ?>
      <h3>not a member yet
    <a href ="adminsignup.php">signup</a></h3>
  </form>
</body>
</html>