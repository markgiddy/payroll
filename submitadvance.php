<?php
require 'connection.php';

// define variables and set to empty values
		$advanceIdErr = $teacherIdErr = $advanceErr = "";
		$advanceId =  $teacherId = $advance = "";

		if(isset($_POST['submit'])){
		  if (empty($_POST["advance"])) {
           $advanceIdErr = "advanceId is required";
		   echo'advanceId is empty ';

         } else {
          $advanceId = validate($_POST['advance']); 
			echo'advanceId is '. $advanceId;
          }
		  
		  if (empty($_POST["teacherId"])) {
			$teacherIdErr = "teacherId is required";
		  } else {
			$teacherId = validate($_POST['teacherId']);
		  }
		  
			if (empty($_POST["advance"])) {
			$advanceErr = "advance is required";
		  } else {
			$advance = validate($_POST['advance']);
		  }

		 
		  
		 
		}

		  if($advanceId !="" && $teacherId !="" && $advance !=""){		  
			$sql = "INSERT INTO `advance` (advance_id, teacher_id, advance) VALUES ('$advanceId', '$teacherId', '$advance')";
		
		
			// insert in database 
			$rs = mysqli_query($conn, $sql);
			
			if($rs){
				echo "Request successfully... ";
				
				header('Location: teacherdashboard.html');
			
			}else{
				echo "Request Failed ...  ". $conn ->error;
			}
			$conn->close();
		  }else{
			//die('check your data' );

		  }
		  	
		function validate($data) {
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;

	  }

?>