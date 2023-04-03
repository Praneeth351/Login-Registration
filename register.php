<?php
include 'config.php';

if (isset($_POST['submit'])) {
	//Save all values given in respective variables 
	
	$name1 = $_POST['name1'];
	$name2 = $_POST['name2'];
	
	$email = $_POST['email'];
	
	$pwd1 = $_POST['pwd1'];
	$pwd2 = $_POST['pwd2'];

	//If password does not match confirm password then throw error 
	if ($pwd1 != $pwd2) {
		echo "<script>alert('Passwords are not matching.')</script>";
	} else {	
		//Check if user with the same employee id already exists
		$query = "SELECT * FROM users where email='$email' ";
		$result = mysqli_query($conn, $query);
		if (mysqli_num_rows($result) > 0) {
			echo "<script>alert('User had been registered. Please login.')</script>";
		} else {
			//Insert new employee entry into database 
			$query = "INSERT INTO users ( first_name, last_name, email,pass) 
				VALUES ('$name1','$name2','$email','$pwd1')";

			$result = mysqli_query($conn, $query);
			//If insertion is successful, then redirect to login page else throw error 
			if ($result) {
				echo "<script>alert('User registerd!')</script>";
				header("Location: index.php");
			} else {
				echo "<script>alert('An error occured!')</script>";
			}
		}
	}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update Page</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
  <style>
    body {
      height: 90vh;
	  background-image: url('ppcolour.png');
 	  background-repeat: no-repeat;
    }
	.container{
        max-width: 30%;
        background-color: white;
        padding: 23px;
    }

	.button {
  background-color: green ; /* Green */
  border: none;
  color: white;
  padding: 16px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  transition-duration: 0.4s;
  cursor: pointer;
}
  </style>



<body>
	<div class="container">
		<div class="row col-md-14 col-md-offset-3">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h1>Registration Form</h1> <br><br>
				</div>
				<div class="panel-body">
					<form action="" method="post">

						<div class="form-group">
							<label for="name1" class="form-label"><b>First Name</b></label>
							<input type="text" class="form-control" id="name1" name="name1" placeholder="First Name" required />
						</div>
						<br>
						<div class="form-group">
							<label for="name2" class="form-label"><b>Last Name</b></label>
							<input type="text" class="form-control" id="name2" name="name2" placeholder="Last Name" required />
						</div>
						<br>
						
							
						<div class="row">
								<div class="form-group">
									<label class="form-label" for="email"><b>email</b></label>
									<input type="email" class="form-control" name="email" id="email" placeholder="email" required />
								</div>
						</div>
						<br>
						<div class="form-group">
							<label for="pwd1" class="form-label"><b>Password</b></label>
							<input type="password" class="form-control" name="pwd1" id="pwd1" placeholder="Password" required />
						</div>
						<br>
						<div class="form-group">
							<label for="pwd2" class="form-label"><b>Confirm Password</b></label>
							<input type="password" class="form-control" name="pwd2" id="pwd2" placeholder="Confirm Password" required />
						</div>
						<br>
						<div class="row">
							<div style="align-items: center;padding-left: 3%;">
								<button type="submit" name="submit"  class="button"><b>Register</b></button>
								
								      <br><br><b>Already a user?</b	> <a href="index.php">Login</a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>

</html>

