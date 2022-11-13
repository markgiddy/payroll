	
	<?php  
	$conn = new mysqli('localhost','vcuser','vcuser123','payroll');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	}
	?>
 