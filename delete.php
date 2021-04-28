<?php
session_start();
if(!isset( $_SESSION["user"]))
       {
           header("Location:adminlogin.php");
       }
   include 'db.php';

    $id = $_GET["id"];
    $q = " DELETE  FROM recep WHERE id = '$id' ";

  mysqli_query($conn,$q);

  header('location:stafflist.php');

?>
