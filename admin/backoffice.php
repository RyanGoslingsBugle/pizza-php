<?php 
	session_start();
	if (!isset($_SESSION['adminUser'])) { 
		header("location: index.php"); 
		die();
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
				<?php require './adminfetch.php'; ?>
				<?php include './admin-users.php'; ?>
				<?php include './admin-orders.php'; ?>
			</div>
		</div>
	</div>
</body>
</html>