<?php 
	session_start();
	require '../config/db.php';

	$user_err ="";

	// if user is logged in, fetch selected users
	if (isset($_SESSION['adminUser'])) {

		// get user id from query param
		if (isset($_GET['id'])) {

			// Generate new MySQL connection
			$conn = new mysqli($host, $username, $password, $db);

			// Check connection
			if ($conn->connect_error) {
			    $user_err = "Connection failed: " . $conn->connect_error;
			}

			$id = mysqli_real_escape_string($conn, $_GET['id']);

			// Prepare query
			$query = "SELECT * FROM users WHERE id='$id';";

			// execute query
			$result = $conn->query($query);

			if ($result->error) {
				$user_err = "Lookup failed: " . $result->error;
			}
			$user = $result->fetch_assoc();
		}
	} else {
		header("location: index.php");
	}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="../css/style.css">
<script type="text/javascript" src="../js/scripts.js"></script>
<title>Pizza Action | Admin Interface</title>
</head>
<body>
	<!-- Outer container for the full page -->
	<div id="container">
		<?php include './admin-header.php'; ?>
		<div class="content">
			<div class="full-page">
				<?php if($user_err){ echo "<span class=\"error\">" . $user_err . "</span>"; } ?>
				<?php include './admin-user-content.php'; ?>
			</div>
		</div>
	</div>
</body>
</html>