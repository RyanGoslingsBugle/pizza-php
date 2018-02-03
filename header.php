<!-- Include code to catch login attempts -->
<?php include __DIR__ . '/login.php'; ?>

<div class="header">

	<!-- Top row of the header bar -->
	<div class="row">
		<div class="column-12 title">
			<a href="http://www.student.soc.napier.ac.uk/~40329421/index.php"><h1>Pizza Action</h1></a>
		</div>
	</div>

	<!-- Header bar menu -->
	<div class="row">
		<div class="nav column-12">
			<ul class="topnav">
				<li><a>Deals</a></li>
				<li><a <?php if (basename($_SERVER['PHP_SELF']) == 'index.php') { echo 'class="active"'; } ?> href="http://www.student.soc.napier.ac.uk/~40329421/index.php">Pizza</a></li>
				<li><a>Pasta</a></li>
				<li class="last-left"><a>Dessert</a></li>
				<li class="last">
					<a id="last-nav" <?php if (isset($_SESSION['loggedInUser'])) { echo 'class="active wide" href="http://www.student.soc.napier.ac.uk/~40329421/user/user.php"'; } else { echo 'class="wide" onclick="showLogin()"';} ?> > 
						<?php echo (isset($_SESSION['loggedInUser']) ? 'Your Account' : 'Log In/Sign Up'); ?>
					</a>
				</li>
				<?php if (isset($_SESSION['loggedInUser'])) { echo '<li class="last"><a class="logout-nav" href="http://www.student.soc.napier.ac.uk/~40329421/logout.php">Logout</a></li>'; } ?>
			</ul>
		</div>
	</div>

	<!-- Login modal dialog -->
	<div id="login-form" class="login-modal <?php if (!empty($login_error)) { echo 'visible'; } ?>">
		<div id="mask">
			<div class="modal-content">
				<div class="tab-holder">
					<ul class="modal-tab-picker">
						<li id="login-tab" class="modal-tab active"><a onclick="loginSwitch()">Log In</a></li>
						<li id="signup-tab" class="modal-tab"><a onclick="signupSwitch()">Sign Up</a></li>
					</ul>
				</div>
				<div id="modal-login">
					<h2>Log in to your account</h2>
					<form method="post" action="">
						<input type="email" name="uname" placeholder="Email Address" autofocus required>
						<br>
						<input type="password" name="pass" placeholder="Password" required>
						<br>
						<input type="submit" name="submit" value="Log In">
						<?php if (!empty($login_error)) { echo '<br><span class="error">' . $login_error . '</span>';} ?>
					</form>
				</div>
				<div id="modal-signup" class="hidden">
					<h2>Create your account</h2>
					<form method="post" action="">
						<input type="email" name="uname" placeholder="Email Address" autofocus required>
						<br>
						<input type="password" name="pass1" placeholder="Password" required>
						<br>
						<input type="password" name="pass2" placeholder="Repeat Password" required>
						<br>
						<input type="submit" name="submit" value="Create Account">
					</form>
				</div>
			</div>
		</div>
	</div>

</div>