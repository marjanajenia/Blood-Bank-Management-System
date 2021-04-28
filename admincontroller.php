<?php
   
   $fname="";
   $lname="";
   $gender="";
   $address="";
   $btype="";
   $username="";
   $password="";
   $email="";

   $firstnameerr=""; 
   $lastnameerr="";
   $gendererr ="";
   $addresserr= "";
   $btypeerr ="";
   $patternerrf =""; 
   $patternerrl ="";
   $usernameerr="";
   $wrongemail="";
   $passworderr ="";
   $notavailable ="";
   $has_error=false;

   if(isset($_POST["signup"]))
   {
   	 if(empty($_POST["fname"])) {
   	 	$firstnameerr="please change";
   		 $has_error=true;
     }
     else{
   	     $fname=($_POST["fname"]);
         if (!preg_match("/^[a-zA-Z ]*$/",$fname)) 
              {
                  $firstnameerr = "Valid Name Required";
                    $has_error=true;
               }
     }
      if(empty($_POST['lname'])) {                    
                   $has_error=true; 
                    
                }
                else{
                	 $lastname= $_POST['lname'];	                          

              if(!preg_match("/^[a-zA-Z]*$/", ($_POST['lname']) )){
                    $patternerrl = "only letter allowed in lastname";
                    $has_error=true;
              }
          }

              if(empty($_POST['gender'])) {                    
                    $gendererr = "Please Fill!";
                    $has_error=true;
                    
              }
              else{ $gender=$_POST['gender'];

              }
              if(empty($_POST['address'])) {                    
                    $addresserr = "Please Fill up the address!";
                    $has_error=true;
                    
              }
              else{$address=$_POST['address'];

              }
              if(empty($_POST['btype'])) {                    
                    $btypeerr = "Please Fill up the blood group!";
                    $has_error=true;
                    
              }
              else{ $bloodtype=$_POST['btype'];

              }

              if(empty($_POST['username'])) {                    
                    $usernameerr = "Please Fill up the username!";
                    $has_error=true;
                    
              }
              else{ $username=$_POST['username'];

              }

              if(empty($_POST['password'])) {                    
                    $passworderr = "Please Fill up the gender!";
                    $has_error=true;
                    
              }
              else{
              	 $password=$_POST['password'];
              }

              
 }
?>