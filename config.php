<?php
//Since port has been changed on XAMPP, change MySQL server connections.
$servername = "127.0.0.1";
$username = "root";
$password = "";
$database="dblab8";


$conn = mysqli_connect($servername, $username, $password,$database);

if (!$conn) {
	die("<script>alert('Connection Failed.')</script>");
}