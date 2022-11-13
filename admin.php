<html>
 <head>
   <title>Login Form</title 
   <link href="css/style.css" rel="stylesheet">
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


<div class="topnav">
  <a class="active" href="index.html">Home</a>
  <a href="login.php">Login</a>
  <a href="register.php">Register</a>
   <a href="admin.php">Admin</a>
  <a href="about.html">About</a>
</div>

<div style="padding-left:16px">
  <h2 style="align:center">Admin </h2>
  <div class="admin-form">
   <form action="admin.php" method="post">
		 <p>AdminId</p>
			 <input type="text" id="userId" name="userId" placeholder="userId" >
		 <P>Password</P>
		<input type="password" id="password" name= "password" placeholder="password">
		<div class="row" style="margin-top:15px;">
		<button type="submit">Login</button>
		</div> 
   </form>

   </div> 
  
  
  
</div>
 


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

		//if($role == 'A'){
			// SQL statement
			if ($stmt = $conn->prepare('SELECT user_id, password FROM admin WHERE user_id = ? ')) {
				echo($_POST['userId']);
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
						$_SESSION['userid'] = $userid;				
						
						//echo 'id is '. $id;
					//echo 'Welcome ' . $_SESSION['userid'] . '!';
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
			
		//}else if($role == 'A'){
			//  SQL statement
			
		}
		
		//else{
			echo ' User type selected';

		}
		
	
	
		$conn->close();
	//}
 //}
 ?>
 
 </body>

</html>