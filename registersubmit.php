<?php

// define variables and set to empty values
$userIdErr = $firstNameErr = $lastNameErr = $emailErr = $phoneNumberErr = $idNumberErr = $passwordErr = $roleErr = "";
$userId =  $firstName = $lastName = $email = $phoneNumber = $idNumber = $password = $role = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["userid"])) {
	$userIdErr = "UserId is required";
  } else {
	$userId = $_POST['userid']; 
  }
  
  if (empty($_POST["firstName"])) {
	$firstNameErr = "First Name is required";
  } else {
	$firstName = $_POST['firstName'];
  }
  
	if (empty($_POST["lastName"])) {
	$lastNameErr = "Last Name is required";
  } else {
	$lastName = $_POST['lastName'];
  }

  if (empty($_POST["email"])) {
	$emailErr = "Email is required";
  } else {
	$email = $_POST['email'];
  }

  if (empty($_POST["phoneNumber"])) {
	$phoneNumberErr = "Phone Number is required";
  } else {
	$phoneNumber = $_POST['phoneNumber']; 
  }
  
  if (empty($_POST["idnumber"])) {
	$idNumberErr = "Id Number is required";
  } else {
	$idNumber = $_POST['idnumber']; 
  }
  
  if (empty($_POST["password"])) {
	$passwordErr = "Password is required";
  } else {
	$password = $_POST['password']; 
  }
  
	if (empty($_POST["role"])) {
	$roleErr = "Please select user type";
  } else {
	$role = $_POST['role']; 
  }  
}
	
	// Change the line below to your timezone!
	date_default_timezone_set('Africa/Nairobi');
	$date = date('m/d/Y h:i:s a', time());

	// Database connection
	$conn = new mysqli('localhost','vcuser','vcuser123','payroll');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {

		if($role == 'T'){
			echo 'teacher` selected';
			// database insert SQL code
			$sql = "INSERT INTO `teacher` (teacher_id, first_name, last_name, email, phone_number, password, id_number) VALUES ('$userId', '$firstName', '$lastName', '$email', '$phoneNumber', '$password', '$idNumber' )";
		}else if($role == 'A'){
			echo ' Admin selected';
			// database insert SQL code
			$sql = "INSERT INTO `hod` ((teacher_id, first_name, last_name, email, phone_number, password, id_number) VALUES ('$userId', '$firstName', '$lastName', '$email', '$phoneNumber', '$password', '$idNumber' )";
		
		}else{
			echo ' User type selected';

		}
		
	// insert in database 
		$rs = mysqli_query($conn, $sql);
			echo 'rs is'.$rs;

		if($rs)
		{
				$sql2 = "INSERT INTO `teacher` (teacher_id, first_name, last_name, email, phone_number, password, id_number) VALUES ('$userId', '$firstName', '$lastName', '$email', '$phoneNumber', '$password', '$idNumber' )";
			
			// insert in database 
			$rs2 = mysqli_query($conn, $sql2);
			
			if($rs2){
				echo "Registration successfully... ";
				header('Location: login.html');

				
			}else{
				echo "Registration Failed in query 2...  ". $conn ->error;

			}
		}else{
			echo "Registration Failed...  ". $conn ->error;

		}
	
	
		$conn->close();
	}
?>