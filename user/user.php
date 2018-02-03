<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="../css/style.css">
<script type="text/javascript" src="../js/scripts.js"></script>
<title>Pizza Action | Update your account details</title>
</head>

<body>

	<!-- Outer container for the full page -->
	<div id="container">
		
		<!-- Inner container for the header bar -->
		<?php include '../header.php'; ?>

		<!-- Container for page content -->
		<?php if (isset($_SESSION['loggedInUser'])) {
			include './user-content.php';
		} else {
			include '../403.php';
		} ?>

		<!-- Inner container for the footer -->
		<?php include '../footer.php'; ?>
		
	</div>
</body>

</html>