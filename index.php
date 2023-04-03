<?php
require 'config.php';
if (isset($_POST['submit'])) {
	$empid = $_POST['emp'];
	$pwd = $_POST['pass'];
	
	// select query to check if profile exists 
	$query = "SELECT * FROM users WHERE email='$empid' and pass='$pwd'";
	$result = mysqli_query($conn, $query);
	
	//If there exists a row with the given credentials, then redirect to respective profile page otherwise stay on same page by alert 
	if (mysqli_num_rows($result) != 0) {
		session_start();
		$_SESSION['sess_user'] = $empid;
		header("Location: profile.php");
	} else {
		echo "<script>alert('Invalid email or password.')</script>";
	}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	
<meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Index</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
  <style>
    body {
			height: 90vh;
			background-color: #f0f0f0;
			font-family: Arial, Helvetica, sans-serif;
			background-image: url('ppcolour.png');
 	 	    background-repeat: no-repeat;
		}

		.container {
			max-width: 30%;
			background-color: #fff;
			margin-top: 50px;
			padding: 23px;
			box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.5);
			border-radius: 5px;
		}

		h1 {
			font-size: 36px;
			font-weight: bold;
			text-align: center;
			margin-top: 0;
			margin-bottom: 30px;
		}

		form {
			margin-bottom: 0;
		}

		.form-group {
			margin-bottom: 20px;
		}

		.form-label {
			font-size: 18px;
			font-weight: bold;
			margin-bottom: 10px;
		}

		.form-control {
			height: 50px;
			font-size: 16px;
			border-radius: 5px;
			border: 1px solid #ddd;
			padding: 10px;
		}

		.form-control:focus {
			outline: none;
			border-color: #007bff;
			box-shadow: 0px 0px 5px 0px rgba(0, 123, 255, 0.5);
		}

		input[type="submit"] {
			background-color: #007bff;
			color: #fff;
			border: none;
			border-radius: 5px;
			font-size: 18px;
			font-weight: bold;
			padding: 10px 20px;
			cursor: pointer;
			transition: background-color 0.3s ease;
		}

		input[type="submit"]:hover {
			background-color: #0069d9;
		}

		.alert {
			margin-top: 20px;
			padding: 15px;
			border-radius: 5px;
			color: #721c24;
			background-color: #f8d7da;
			border: 1px solid #f5c6cb;
		}


  </style>

<body>
	<div class="container">
		<div class="row col-md-14 col-md-offset-3">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h1 style="text-align: center;">Sign In</h1>
				</div>
				<div class="panel-body">
					<form action="" method="post">
						<div class="form-group">
							<label class="form-label" for="eid">Email ID</label>
							<input type="text" class="form-control" name="emp" id="eid" placeholder="Email"  required />
						</div>
						<div class="form-group">
							<label for="pwd" class="form-label">Password</label>
							<input type="password" class="form-control" id="pwd" name="pass" placeholder="Password" required />
						</div>
						<div class="row">
							<div style="align-items: center;padding-left: 3%;">
								<input type="submit" value="Login" name="submit" /><br><br>
								No credentials yet? <a href="register.php">Register</a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>

</html>
