
<html>
 <head>
   <title>Register Form</title> 
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
$userIdErr = $firstNameErr = $lastNameErr = $emailErr = $phoneNumberErr = $idNumberErr = $passwordErr = $roleErr = "";
$userId =  $firstName = $lastName = $email = $phoneNumber = $idNumber = $password = $role = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["username"])) {
	$userIdErr = "UserId is required";
  } else {
	$userId = $_POST['username']; 
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
  
  if (empty($_POST["idNumber"])) {
	$idNumberErr = "Id Number is required";
  } else {
	$idNumber = $_POST['idnumber']; 
  }
  
  if (empty($_POST["password"])) {
	$passwordErr = "Password is required";
  } else {
	$phoneNumber = $_POST['phoneNumber']; 
  }
  
	if (empty($_POST["role"])) {
	$roleErr = "Please select user type";
  } else {
	$role = $_POST['role']; 
  }  
}
		
?>

<div class="topnav">
  <a class="active" href="index.html">Home</a>
  <a href="login.html">Login</a>
  <a href="register.php">Register</a>
  <a href="admin.html">Admin</a>
  <a href="about.html">About</a>
</div>

<div style="padding-left:16px">
  <h2 style="align:center">Register </h2>
  <div class="register-form">
  <form method="post" action="registersubmit.php">

	  <div class="col-8">
	  
	   <div class="row">
	  
		  <div class="col-6">
		     	<p >Select user type</p>
			 <div class="radiogroup">
				<input type="radio" class="radio" name="role" value="T" id="z" checked="checked"/>
				<label for="z">teacher
			</label>
			</div>
			  
		  </div>
		   <div class="col-">
			  <div id="idnumber">
			 <p  >Id Number</p>
			 <input type="text" id="idnumber" name="idnumber" placeholder="IdNumber">
			 	<span class="error">* <?php echo $userIdErr;?></span>
			 </div>
		
		  </div>
	  
	  </div>
	  
	  <div class="row">

	  <div class="col-6">
			 <p>Userid</p>
		 <input type="text" id="userid" name="userid" placeholder="User_id">
		 <span class="error">* <?php echo $userIdErr;?></span>

		  </div>
	  
		 
		   <div class="col-">
			 <P>Lastname</P>
		<input type="text" id="lastName" name="lastName" placeholder="Lastname">
		<span class="error">* <?php echo $lastNameErr;?></span>

		  </div>
	  
	  </div>
	  
	   <div class="row">
	  
	   <div class="col-6">
			 <p>Firstname</p>
			 <input type="text" id="firstName" name="firstName" placeholder="Firstname" >
			 <span class="error">* <?php echo $firstNameErr;?></span>

		  </div>
		   <div class="col-">
			 <p>Password</p>
		 <input type="password" id="password" name="password" placeholder="Password">
		 <span class="error">* <?php echo $passwordErr;?></span>

		  </div>
	  
	  </div>
		
		 <div class="row">
	  
		  <div class="col-6">
			  <p>Phone_number</p>
		 <input type="number" id="phoneNumber" name="phoneNumber" placeholder="Phone_number">
		   <span class="error">* <?php echo $phoneNumberErr;?></span>

			  
		  </div>
		   <div class="col-">
			  <p>email</p>
		 <input type="text" id="email" name = "email" placeholder="email">
		 <span class="error">* <?php echo $emailErr;?></span>

		  </div>
	  
	  </div>
	  
	   <div class="row" style="margin-top:15px;">
	  
		   <div class="col-">
			 <button type="submit">submit</button>

		  </div>
	  
	  </div>
		
	  <div>
	  </div>
   </form>

   </div> 
  
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<script>

$('input[type=radio][name=role]').change(function() {
    if (this.value == 'S') {
	$("#hodnum").hide();
	$("#studentnum").show();

    }
    else if (this.value == 'H') {
	$("#studentnum").hide();
	$("#hodnum").show();

    }
});







</script>
 
</body>

</html>
