<?php

// require db config values
require __DIR__ . '/config/db.php';

// create PHP session to store login credentials
session_start();

// new error var
$login_error = "";

// check if form has been submitted & select code path
if (isset($_POST['submit']) && $_POST['submit'] == 'Log In'){
	// login path
	// check that fields are not empty
	if (empty($_POST['uname']) || empty($_POST['pass'])) {
		$login_error = "Username or password field missing, please try again.";
	} else {
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
		$query = "SELECT * FROM users WHERE email='$user';";

		// run query
		$result = $conn->query($query);

		// compare email/passwords to grant entry
		if ($result->num_rows == 1) {
			$value = $result->fetch_assoc();
			if (crypt($pass, $value['password']) == $value['password']) {
				$_SESSION['loggedInUser'] = $user;
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
} else if (isset($_POST['submit']) && $_POST['submit'] == 'Create Account') {
	// register path
	if (empty($_POST['uname']) || empty($_POST['pass1']) || empty($_POST['pass2'])) {
		$login_error = "Username or password field missing, please try again.";
	} else if ($_POST['pass1'] != $_POST['pass2']) {
		$login_error = "Passwords don't match, please try again.";
	} else {
		// Generate new MySQL connection
		$conn = new mysqli($host, $username, $password, $db);

		// Check connection
		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		}

		// Sanitise input
		$user = mysqli_real_escape_string($conn, $_POST['uname']);
		$pass = mysqli_real_escape_string($conn, $_POST['pass1']);

		// check if user exists already
		$query = "SELECT * FROM users WHERE email = '$user';";
		$result = $conn->query($query);
		if ($result->num_rows > 0) {
			$login_error = "User email already exists, please choose another.";
		} else {
			// hash password
			$pass_hash = crypt($pass);

			// generate query
			$query = "INSERT INTO users(email, password) VALUES ('$user', '$pass_hash');";

			// create user
			$result = $conn->query($query);
			
			$_SESSION['loggedInUser'] = $user;
		}

		// close connection
		$conn->close();
	}
}

