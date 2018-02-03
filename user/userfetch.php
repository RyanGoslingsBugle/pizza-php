</<?php 

// require db config values
require '../config/db.php';

// if user is logged in, fetch profile details (not including password)
if (isset($_SESSION['loggedInUser'])) {

	// Generate new MySQL connection
	$conn = new mysqli($host, $username, $password, $db);

	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}

	$user = $_SESSION['loggedInUser'];

	// prepare query
	$query = "SELECT * FROM users WHERE email='$user';";

	// run query
	$result = $conn->query($query);
	$value = $result->fetch_assoc();

	$street_address = $value['street_address'];
	$city = $value['city'];
	$postcode = $value['postcode'];
	$image_url = $value['image_url'];
	$fname = $value['fname'];
	$lname = $value['lname'];

	// close connection
	$conn->close();
}