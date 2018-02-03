<?php

session_start();

// require db config values
require '../config/db.php';

$delete_err = "";

// if user is logged in, allow record deletion
if (isset($_SESSION['adminUser'])) {

	if (isset($_GET['id'])) {

		// Generate new MySQL connection
		$conn = new mysqli($host, $username, $password, $db);

		// Check connection
		if ($conn->connect_error) {
		    $delete_err = "Connection failed: " . $conn->connect_error;
		}

		// prepare delete
		$query = $conn->prepare('DELETE FROM users WHERE id=?');
		$query->bind_param('i', $_GET['id']);

		// run query
		$query->execute();
	}
}

header('location: backoffice.php');