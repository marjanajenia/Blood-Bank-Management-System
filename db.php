<?php
      $host="localhost";
      $dbusername="root";
      $dbpassword="";
      $dbname="dbms";

      //connection
      $conn = mysqli_connect($host,$dbusername,$dbpassword,$dbname);
	  
     function execute($query){ //this one is for insert, update ,delete,
		global $host, $dbusername, $dbpassword,$dbname;
		$conn = mysqli_connect($host,$dbusername,$dbpassword,$dbname);
		$result = mysqli_query($conn,$query);
	}
	
	function getArray($query){
		global $host, $dbusername, $dbpassword,$dbname;
		$conn = mysqli_connect($host,$dbusername,$dbpassword,$dbname);
		$result = mysqli_query($conn,$query);
		$data = array();
		while($row = mysqli_fetch_assoc($result)){
			$data[] = $row;
		}
		return $data;
	}
      

?>