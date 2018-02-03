<?php

// require db config values
require '../config/db.php';

$orders = array();
$users = array();
$order_err = "";
$user_err = "";

// if user is logged in, fetch all orders and users
if (isset($_SESSION['adminUser'])) {

	// Generate new MySQL connection
	$conn = new mysqli($host, $username, $password, $db);

	// Check connection
	if ($conn->connect_error) {
	    $order_err = "Connection failed: " . $conn->connect_error;
	}

	// prepare query
	$query = "SELECT orders.id, orders.order_date, users.email, orders.total_price, orders.items, orders.address, orders.status FROM orders
	JOIN users ON orders.user_id = users.id";

	// run query
	$result = $conn->query($query);

	if ($result->error) {
		$order_err = "Lookup error: " . $result->error;
	}

	while($row = $result->fetch_assoc()) {
		$orders[] = $row;
	}

	// prepare user query
	$query2 = "SELECT users.id, users.email, users.fname, users.lname, CONCAT(users.street_address, ', ', users.city, ', ', users.postcode) AS address FROM users;";

	// run query
	$result2 = $conn->query($query2);

	if ($result2->error) {
		$user_err = "Lookup error: " . $result2->error;
	}

	while($row = $result2->fetch_assoc()) {
		$users[] = $row;
	}

}

function BuildUsersTable($input)
{
	foreach ($input as $row) {
		echo "<tr class=\"clickable\"><td>";
		echo implode("</td><td>", $row);
		echo "</td><td><button class=\"table-button\" onclick=\"goToUser(" . $row['id'] . ")\">View</button>";
		echo "</td><td><button class=\"table-button\" onclick=\"deleteUser(" . $row['id'] . ")\">Delete</button>";
		echo "</td></tr>";
	}
}

function BuildOrdersTable($input)
{
	foreach ($input as $row) {
		echo "<tr><td>";
		echo implode("</td><td>", $row);
		echo "</td></tr>";
	}
}