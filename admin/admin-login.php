<?php 

// require db config values
require '../config/db.php';

// create PHP session to store login credentials
session_start();

// new error var
$login_error = "";

if (isset($_POST['submit'])) {
	// Generate new MySQL connection
	$conn = new mysqli($host, $username, $password, $db);

	// Check connection
	if ($conn->connect_error) {
	    $login_error = "Connection failed: " . $conn->connect_error;
	}

	// Sanitise input
	$user = mysqli_real_escape_string($conn, $_POST['uname']);
	$pass = mysqli_real_escape_string($conn, $_POST['pass']);

	// prepare query
	$query = "SELECT * FROM admins WHERE email='$user';";

	// run query
	$result = $conn->query($query);

	// compare email/passwords to grant entry
	if ($result->num_rows == 1) {
		$value = $result->fetch_assoc();
		if (crypt($pass, $value['password']) == $value['password']) {
			$_SESSION['adminUser'] = $user;
			header("location: backoffice.php");
		} else {
			$login_error = "Username/password combination not found.";
		}
	} else if ($result->num_rows > 1) {
		$login_error = "Too many matches, check for duplicate data.";
	} else {
		$login_error = "Username/password combination not found.";
	}

	// close connection
	$conn->close();	
}