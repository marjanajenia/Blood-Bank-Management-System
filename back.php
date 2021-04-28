<?php
  $conn=mysqli_connect('localhost','root',"",'dbms');

  extract($_POST);

  if(isset($_POST['readrecord']))
  {
  	$data='<table class="table table-bordered table-striped">

           <tr>
  	          <th> Id</th>
			  <th> Name</th> 
			  <th> Email</th> 
			  <th> Username </th> 
			  <th> Gender </th>
			  <th> Password</th>
			  <th> Address </th>
			  <th> Blood group </th>
			  <th> Salary </th>
			  <th> Delete</th>			  
			  
		    </tr> ';

		 $query="SELECT * FROM `recep` "; 
         $result=mysqli_query($conn,$query); 

         if(mysqli_num_rows($result) > 0 ){
         	$num=1;
		
	     while($rows=mysqli_fetch_assoc($result)) 
		{ 
		 
		$data .='<tr> 
		<td>'.$num.'</td> 
		<td>'.$rows['name'].'</td> 
		<td>'. $rows['email'].'</td> 
		<td>'. $rows['username'].'</td>
		<td>'.$rows['gender'].'</td> 
		<td>'. $rows['password'].'</td> 
		<td>'. $rows['address'].'</td> 
		<td>'.$rows['btype'].'</td> 
		<td>'. $rows['salary'].'</td> 
		<td><button onclick="deleter('.$rows['id'].')"class="btn-danger" class="text-white" >Delete</button></td>

		
		</tr> ';
		$num++;
     }
   }
        $data.='</table>';
        echo $data;
    }

  if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['username']) && isset($_POST['gender']) && isset($_POST['password']) && isset($_POST['address']) && isset($_POST['btype']) && isset($_POST['salary'])){
  	$query="INSERT INTO `recep`( `name`, `email`, `username`, `gender`, `password`, `address`, `btype`,`salary`) VALUES ('$name','$email','$username','$gender','$password','$address','$btype','$salary')";
  	

  mysqli_query($conn,$query);
}
//delete
if(isset($_POST['deleteid'])){
	$uid=$_POST['deleteid'];
	 $q = " DELETE  FROM recep WHERE id = '$uid' ";
	 mysqli_query($conn,$q);

}
//salary
/*if(isset($_POST['id']) && isset($_POST['id']) !="")
{
	$urid=$_POST['id'];
	$qr="SELECT * FROM recep where id='$urid";
	if(!$result=mysqli_query($conn,$qr));
	{
		exit(mysqli_error());
	}
	$response=array();
	if(mysqli_num_rows($result) > 0 ){
		
	     while($rows=mysqli_fetch_assoc($result)) 
		{ 
			$response=$row;
		}
    }
    else{
    	$response['status']=200;
    	$response['message']= "data not found";
    }
    echo json_encode($response);
}
else{
	$response['status']=200;
    $response['message']= "invalid request";
}*/

?>