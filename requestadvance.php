<?php require 'connection.php';?>

<html>
 <head>
   <link href="css/style.css" rel="stylesheet">
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   
 <style>
.topnav {
  overflow: hidden;
  background-color: #333;
}

.topnav a {
  float: left;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
  background-color: #04AA6D;
  color: white;
}
</style>
</head>
<body>
<?php
// define variables and set to empty values
$userId = $userIdErr = "";
$advance =  $advance = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (empty($_POST["userId"])) {
	  $userIdErr = "UserId is required";
	} else {
	  $userId = $_POST['userId']; 
	}

	if (empty($_POST["advance"])) {
		$advanceErr = "advance is required";
	  } else {
		$advance = $_POST['advance']; 
	  }

	  // Database connection
	$conn = new mysqli('localhost','vcuser','vcuser123','payroll');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} 
	// database insert SQL code
	$sql = "INSERT INTO `advance` (teacher_id, advance) VALUES ('$userId', '$advance')";

	// insert in database 
	$rs = mysqli_query($conn, $sql);
	echo 'rs is'.$rs;
	if($rs){
		echo "Advance Request successfully... ";
		header('Location: teacherdashboard.php');

	}else{
			echo "Submission Failed...  ". $conn ->error;

		}
	
	
		$conn->close();

		
	}
?>
<div class="topnav">
		  <a class="active" href="teacherdashboard.html">Dashboard</a>
			<a href="requestadvance.html"> Request advance</a>
			<a href="checkbalance.php"> Check balance</a>
			<a href="index.html"><i class="fas fa-sign-out-alt"></i>Logout</a>
		  
		  
		</div>

<div style="padding-left:16px">
  <h2 style="align:center">Advance request </h2>
  <div class="advance-form">
   <form action="requestadvance.php" method="post">

     
	  <div class="col-8">
	  
	   <div class="row">
	  
	  
	  </div>
	  
	  
	  
	   <div class="row">
	  
		  <div class="col-6">
			 <p>TeacherId</p>
		 <input type="text" id="userId" name="userId" placeholder="UserId">
			  
		  </div>
		  
		  
	  </div>
		
		 <div class="row">
	  
		  <div class="col-6">
			  <p>Advance</p>
		 <input type="text" id="advance" name="advance" placeholder="Enter Amount">
			  
		  </div>
		   
	  
	  </div>
	  
	   <div class="row" style="margin-top:15px;">
	  
		  
		   <div class="col-">
			 <button type="submit"  name="submit" value="Submit"style="color:BLUE"  data-dismiss="toast" aria-label="Close">submit</button>

		  </div>
	  
	  </div>
		
	  <div >
	  </div>
   </form>

   </div> 
  
  
  
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


</script>
 
</body>

</html>
