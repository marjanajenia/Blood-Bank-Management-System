
<!DOCTYPE html>
<html>
<head>
	<title>ajax</title>
	<link rel="stylesheet" type="text/css" href="css/header1.css">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
       
</head>
<body>
	<header>
  <div class="title">
    <h1>BLOOD BANK MANAGEMENT SYSTEM</h1>  
  </div>
</header>
     <div class="container">
     	<h1 class="text-primary text-uppercase text-center">Receptionist list</h1>

     	<div class="d-flex justify-content-end">
     		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
               Add receptionist</button>
     	</div>
      <h2 class="text-danger"></h2>
     	<div id="records_contant"></div>
       
     	<div class="modal" id="myModal">
          <div class="modal-dialog">
          <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Add Receptionist</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
       <div class="form-group">
       	<label>Name</label>
       	<input type="text" name="" id="name"class="form-control" placeholder="Name">
       </div>
       <div class="form-group">
       	<label>Email</label>
       	<input type="email" name="" id="email"class="form-control" placeholder="email">
       </div>
       <div class="form-group">
       	<label>username</label>
       	<input type="text" name="" id="username"class="form-control" placeholder="user Name">
       </div>
       <div class="form-group">
       	<label>Gender</label>
       	<input type="text" name="" id="gender"class="form-control" placeholder="gender">
       </div>
       <div class="form-group">
       	<label>password</label>
       	<input type="password" name="" id="password"class="form-control" placeholder="password">
       </div>
       <div class="form-group">
       	<label>Address</label>
       	<input type="text" name="" id="address"class="form-control" placeholder="Address">
       </div>
       <div class="form-group">
       	<label>Blood group</label>
       	<input type="text" name="" id="btype"class="form-control" placeholder="bloodgroup">
       </div>
       <div class="form-group">
        <label>Salary</label>
        <input type="number" name="" id="salary"class="form-control" placeholder="salary">
       </div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
      	<button type="button" class="btn btn-success" data-dismiss="modal"onclick="addRecord()">Save</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>


</div>
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

 <script type="text/javascript">
 	$(document).ready(function(){
 		 readRecord();
 	});
 	function readRecord(){
 		var readrecord ="readrecord";
 		$.ajax({
 			url:"back.php",
 			type:"post",
 			data:{ readrecord:readrecord },
 			success:function(data,status){
 				$('#records_contant').html(data);
 			}

 		});

 	}
 	function addRecord(){
 		var name=$('#name').val();
 		var email=$('#email').val();
 		var username=$('#username').val();
 		var gender=$('#gender').val();
 		var password=$('#password').val();
 		var address=$('#address').val();
 		var btype=$('#btype').val();
    var salary=$('#salary').val();

 		$.ajax({
 			url:"back.php",
 			type:"post",
 			data:{ name:name,
 				   email:email,
 				   username:username,
 				    gender: gender,
 				     password: password,
 				     address:address,
 				     btype:btype,
             salary:salary
 			 },
 			 success:function(data,status){
 			 	readRecord();
 			 }

 		});
 	}
 	//delete
 	function deleter(deleteid){
 		var conf= confirm("Are you sure");
 		if(conf==true){
 			$.ajax({
 				url:"back.php",
 			    type:"post",
 			    data:{deleteid:deleteid},
 			    success:function(data,status){
 			    	readRecord();

 			    }
 			})
 		}
 	}
 	//salary
 	/*function salary(id){
 		$('#hidden_id').val(id);
 		$.post("back.php",{
 			id:id
 		},function(data,status){
 			var user= JSON.js(data);
 			$('#salary').val(user.salary);
 			
 		}

 			);
 		$('#update_user_model').modal("show");

 	}*/
 </script>
</body>
</html>