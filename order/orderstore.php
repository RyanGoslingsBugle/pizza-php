<?php

// require db config values
require '../config/db.php';

// error var
$data_err = "";

// if submitted store order
if (isset($_POST['submit']) && $_POST['submit'] == 'Buy') {

	// check all values are filled
	if (!empty($_POST['street_address']) && !empty($_POST['city']) && !empty($_POST['postcode']) && !empty($_POST['price']) && !empty($_POST['items'])) {

		// put post data into vars
		$date = date('Y-m-d H:i:s');
		$price = $_POST['price'];
		$items = $_POST['items'];
		$addr = array($_POST['street_address'], $_POST['city'], $_POST['postcode']);
		$address = implode(', ', $addr);
		$status = "Processing";

		// Generate new MySQL connection
		mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
		$conn = new mysqli($host, $username, $password, $db);

		// Check connection
		if ($conn->connect_error) {
		    $data_err = "Connection failed: " . $conn->connect_error;
		}

		// check if user is logged in
		if (isset($_SESSION['loggedInUser'])) {
			$user = $_SESSION['loggedInUser'];
			// get user id
			$id_query = "SELECT id FROM users WHERE email='$user'";
			$id_result = $conn->query($id_query);
			$id_value = $id_result->fetch_assoc();
			$id = $id_value['id'];
			$id_result->close();
			// prepare query with user			
			$query = $conn->prepare("INSERT INTO orders (order_date, total_price, items, address, status, user_id) VALUES (?, ?, ?, ?, ?, ?);");
			$query->bind_param("sdsssi", $date, $price, $items, $address, $status, $id);
		} else {
			$query = $conn->prepare("INSERT INTO orders (order_date, total_price, items, address, status) VALUES (?, ?, ?, ?, ?);");
			$query->bind_param("sdsss", $date, $price, $items, $address, $status);
		}

		// run query
		$query->execute();

		if ($query->error) {
			$data_err = "Insert failed: " . $query->error;
		}

		if ($conn->error) {
			$data_err = "Connection failed: " . $conn->error;
		} else {
			header('location: thank.php');
		}

	} else {
		$data_err = "Missing fields.";
	}
}
