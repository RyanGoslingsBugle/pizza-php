<div class="row account-container">
		<h2>User Details</h2>
		<div class="column-4">
			<div class="avatar-wrap">
				<img class="avatar-img" src=<?php echo ($user['image_url']) ? $user['image_url'] : "img/avatar.jpg" ?>>
			</div>
			<div class="return-wrap">
				<button class="return-button" onclick="adminReturn()">Return to list</button>
			</div>
		</div>
		<div class="column-8">
			<div class="account-holder">
				<form id="account-form" method="post" action="">
					<label for="fname">First Name: </label>
					<input type="text" id="fname" name="fname" placeholder="Your first name" <?php if ($user['fname']){ echo "value=\"" . $user['fname'] . "\""; } ?> readonly>
					<label for="lname">Last Name: </label>
					<input type="text" id="lname" name="lname" placeholder="Your last name" <?php if ($user['lname']){ echo "value=\"" . $user['lname'] . "\""; } ?> readonly>
					<label for="image_url">Avatar Image: </label>
					<input type="text" id="image_url" name="image_url" placeholder="Avatar image location" <?php if ($user['image_url']){ echo "value=\"" . $user['image_url'] . "\""; } ?> readonly>
				</form>
			</div>
			<div class="admin-form-holder">
				<form id="address-form" method="post" action="">
					<label for="street-address">Street Address: </label>
					<input type="text" id="street-address" name="street_address" placeholder="123 Example Avenue" <?php if ($user['street_address']){ echo "value=\"" . $user['street_address'] . "\""; } ?> readonly>
					<label for="city">City: </label>
					<input type="text" id="city" name="city" placeholder="Edinburgh" <?php if ($user['city']){ echo "value=\"" . $user['city'] . "\""; } ?> readonly>
					<label for="postcode">Postcode: </label>
					<input type="text" id="postcode" name="postcode" placeholder="EH12 33FP" <?php if ($user['postcode']){ echo "value=\"" . $user['postcode'] . "\""; } ?> readonly>
				</form>
			</div>
		</div>
</div>