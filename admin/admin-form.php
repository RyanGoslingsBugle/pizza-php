<div id="login-form" class="login-modal visible">
	<div id="mask">
		<div class="modal-content">
			<form method="post" action="">
				<input type="email" name="uname" placeholder="Email Address" autofocus required>
				<br>
				<input type="password" name="pass" placeholder="Password" required>
				<br>
				<input type="submit" name="submit" value="Log In">
				<?php if (!empty($login_error)) { echo '<br><span class="error">' . $login_error . '</span>';} ?>
			</form>
		</div>
	</div>
</div>