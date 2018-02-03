<?php

// require db config values
require '../config/db.php';

$orders = array();
$order_err = "";

// if user is logged in, fetch linked orders
if (isset($_SESSION['loggedInUser'])) {

	// Generate new MySQL connection
	$conn = new mysqli($host, $username, $password, $db);

	// Check connection
	if ($conn->connect_error) {
	    $order_err = "Connection failed: " . $conn->connect_error;
	}

	$user = $_SESSION['loggedInUser'];

	// prepare query
	$query = "SELECT orders.id, orders.order_date, orders.total_price, orders.items, orders.address, orders.status FROM orders
	JOIN users ON orders.user_id = users.id 
	WHERE users.email='$user';";

	// run query
	$result = $conn->query($query);

	if ($result->error) {
		$order_err = "Lookup error: " . $result->error;
	}

	while($row = $result->fetch_assoc()) {
		$orders[] = $row;
	}
}


function BuildTable($input)
{
	// if (is_array($input[0])){
		foreach ($input as $row) {
			echo "<tr><td>";
			echo implode("</td><td>", $row);
			echo "</td></tr>";
		}
	// } else {
	// 	echo "<tr><td>";
	// 	echo implode("</td><td>", $input);
	// 	echo "</td></tr>";
	// }
}