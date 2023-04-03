<?php
//Connect to MySQL 
require 'config.php';
session_start();

//If there is no session user, then redirect to login page 
if (!isset($_SESSION['sess_user'])) {
	header("location: index.php");
}
$empid = $_SESSION['sess_user'];
if (isset($_POST['submit'])) {

	//Store entered values in variables 
	
	
	$pwd = $_POST['pass'];
	$first_name=$_POST['first_name'];
	$last_name=$_POST['last_name'];
	$newpwd=$_POST['newpass'];

	//Check credentials with password and proceed 
	$query = "SELECT * FROM users WHERE email='$empid' AND pass='$pwd'";
	$result = mysqli_query($conn, $query);
	if (mysqli_num_rows($result) != 0) {

		//If any field is left blank, then do not update the attribute. 
		if ($first_name && $last_name && $newpwd) {
			$result = mysqli_query($conn, "UPDATE users SET first_name='$first_name', last_name='$last_name',pass='$newpwd' WHERE email='$empid'");
			if ($result) {
				echo "<script>alert('Profile updated!')</script>";
				header("Location: profile.php");
			} else {
				echo "<script>alert('Something went wrong.')</script>";
			}
		} else if ($first_name) {
			$result = mysqli_query($conn, "UPDATE users SET first_name=$first_name WHERE email='$empid'");
			if ($result) {
				echo "<script>alert('Profile updated!')</script>";
				header("Location: profile.php");
			} else {
				echo "<script>alert('Something went wrong.')</script>";
			}
		} else if ($last_name) {
			$result = mysqli_query($conn, "UPDATE users SET last_name='$last_name' WHERE email='$empid'");
			if ($result) {
				echo "<script>alert('Profile updated!')</script>";
				header("Location: profile.php");
			} else {
				echo "<script>alert('Something went wrong.')</script>";
			}
		}
			else if ($newpwd) {
				$result = mysqli_query($conn, "UPDATE users SET pass='$newpwd' WHERE email='$empid'");
				if ($result) {
					echo "<script>alert('Profile updated!')</script>";
					header("Location: profile.php");
				} else {
					echo "<script>alert('Something went wrong.')</script>";
				}
		} else {
			echo "<script>alert('Atleast one field required.')</script>";
		}
	} else {
		echo "<script>alert('Wrong password.')</script>";
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
        max-width: 40%;
        background-color: white;
        margin-top: 50px;
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
					<h1>Profile Updation</h1>
				</div>
				<div class="panel-body">
					<form action="" method="post">
					
					
					
						
						<br />
						<br>
			
						<div class="row mb-3">
							<label for="pwd" class="col-sm-3 col-form-label"><b>Old Password</b></label>
							<div class="col-sm-9">
								<input type="password" class="form-control" id="pwd" name="pass" required />
							</div>
						</div>
						<br />
						<div class="row mb-3">
							<label for="newpwd" class="col-sm-3 col-form-label"><b>New Password</b></label>
							<div class="col-sm-9">
								<input type="password" class="form-control" id="newpwd" name="newpass" required />
							</div>
						</div>
						
			
						<br />
						<div class="row mb-3">
							<label class="col-sm-3 col-form-label" for="first_name"><b>First Name</b></label>
							<div class="col-sm-9">
								<input type="text" class="form-control"  id="first_name"  name="first_name"/>
							</div>
						</div>
						
						<br />
						<div class="row mb-3">
							<label class="col-sm-3 col-form-label" for="last_name"><b>Last Name</b></label>
							<div class="col-sm-9">
								<input type="text" class="form-control"  id="last_name" name="last_name" />
							</div>
						</div>
						<br />
						<button type="submit" name="submit" class="button">Update</button>
						<a href="profile.php"><br><br>Back to profile</a>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>

</html>