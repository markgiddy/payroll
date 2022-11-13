<?php
session_start();

// define variables and set to empty values
$userIdErr = $passwordErr = $roleErr = "";

 if ($_SERVER["REQUEST_METHOD"] == "POST") {
if (empty($_POST["userId"])) {
    $userIdErr = "userId is required";
  } else {
    $userId = $_POST['userId']; 
	echo $userId;
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
  

	// Database connection
	$conn = new mysqli('localhost','vcuser','vcuser123','payroll');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {

		if($role == 'T'){
			// SQL statement
			if ($stmt = $conn->prepare('SELECT teacher_id, password FROM teacher WHERE teacher_id = ? ')) {
				// 
				$stmt->bind_param('s', $_POST['userId']);
				$stmt->execute();
				// 
				$stmt->store_result();
				
				if ($stmt->num_rows > 0) {
					$stmt->bind_result($userid, $password);
					$stmt->fetch();
					// Account exists, now we verify the password.
					// Note
					if ($_POST['password'] === $password) {
						// Verification success! User has logged-in!
						// Create sessions
						session_regenerate_id();
						$_SESSION['loggedin'] = TRUE;
						$_SESSION['name'] = $_POST['userId'];
						$_SESSION['userid'] = $userid;				
						
						//echo 'id is '. $id;
					//echo 'Welcome ' . $_SESSION['userid'] . '!';
						header('Location: teacherdashboard.php');

					} else {
						// Incorrect password
						echo 'Incorrect password!';
					}
				} else {
					// Incorrect username
					echo 'Incorrect username!';
				}

			}
			
		}else if($role == 'A'){
			echo 'Admin selected';
			//  SQL statement
			if ($stmt = $conn->prepare('SELECT username, password, user_id FROM teacher WHERE username = ? and role = "A" ')) {
				// Bind parameters
				$stmt->bind_param('s', $_POST['userId']);
				$stmt->execute();
				// Store the result and check if the account exists in the database.
				$stmt->store_result();
				
				if ($stmt->num_rows > 0) {
					$stmt->bind_result($id, $password, $userid);
					$stmt->fetch();
					// Account exists, now we verify the password.
					
					if ($_POST['password'] === $password) {
						// verify
						// Create sessdata on the server.
						session_regenerate_id();
						$_SESSION['loggedin'] = TRUE;
						$_SESSION['name'] = $_POST['userId'];
						$_SESSION['id'] = $id;
						$_SESSION['userid'] = $userid;

						//echo 'id is '. $id;
						//echo 'Welcome ' . $_SESSION['id'] . '!';
						header('Location: admindashboard.php');

					} else {
						// Incorrect password
						echo 'Incorrect password!';
					}
				} else {
					// Incorrect username
					echo 'Incorrect username!';
				}

			}
		}
		
		else{
			echo ' User type selected';

		}
		
	
	
		$conn->close();
	}
 }
 ?>