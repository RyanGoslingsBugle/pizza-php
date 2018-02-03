<?php

// require db config values
require '../config/db.php';

// new error var
$update_error = "";

if (isset($_POST['submit'])) {

	// if user is logged in, save data
	if (isset($_SESSION['loggedInUser'])) {

		// Generate new MySQL connection
		$conn = new mysqli($host, $username, $password, $db);

		// Check connection
		if ($conn->connect_error) {
		    $update_error = "Connection failed: " . $conn->connect_error;
		}

		$user = $_SESSION['loggedInUser'];

		// switch on saving address/account details
		if ($_POST['submit'] == 'Save User Details') {

			// check if password is updated 
			if (!empty($_POST['pass1'])) {

				// check passwords match
				if ($_POST['pass1'] === $_POST['pass2']) {

					// prepare query with password
					$query = $conn->prepare("UPDATE users SET fname = ?, lname = ?, image_url = ?, password = ? WHERE email='$user';");

					// bind and execute
					$query->bind_param("ssss", $_POST['fname'], $_POST['lname'], $_POST['image_url'], crypt($_POST['pass1']));
					$query->execute();
				} else {
					$update_error = "Passwords don't match, please try again.";
				}

			} else {
				// prepare query without password
				$query = $conn->prepare("UPDATE users SET fname = ?, lname = ?, image_url = ? WHERE email='$user';");
				// bind and execute
				$query->bind_param("sss", $_POST['fname'], $_POST['lname'], $_POST['image_url']);
				$query->execute();
			}

		} else if ($_POST['submit'] == 'Save This Address') {
			// prepare query
			$query = $conn->prepare("UPDATE users SET street_address = ?, city = ?, postcode = ? WHERE email='$user';");

			// bind and execute
			$query->bind_param("sss", $_POST['street_address'], $_POST['city'], $_POST['postcode']);
			$query->execute();
		}

		if ($conn->error) {
			$update_error = "Update failed: " . $conn->error;
		}
		
		// close connection
		$conn->close();
	}
}