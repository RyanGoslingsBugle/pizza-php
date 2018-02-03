<!-- require the helper module to fetch existing user data -->
<?php require './userupdate.php'; ?>
<?php require './userfetch.php'; ?>
<?php require '../order/orderfetch.php'; ?>

<div class="content">

			<div class="full-page">

				<div class="row account-container">
						<h2>My Account Details</h2>
						<div class="column-4">
							<div class="avatar-wrap">
								<img class="avatar-img" src=<?php echo ($image_url) ? "$image_url" : "../img/avatar.jpg" ?>>
							</div>
						</div>
						<div class="column-8">
							<div class="account-holder">
								<form id="account-form" method="post" action="">
									<label for="fname">First Name: </label>
									<input type="text" id="fname" name="fname" placeholder="Your first name" <?php if ($fname){ echo "value=\"" . $fname . "\""; } ?>>
									<label for="lname">Last Name: </label>
									<input type="text" id="lname" name="lname" placeholder="Your last name" <?php if ($lname){ echo "value=\"" . $lname . "\""; } ?>>
									<label for="image_url">Avatar Image: </label>
									<input type="text" id="image_url" name="image_url" placeholder="Avatar image location" <?php if ($image_url){ echo "value=\"" . $image_url . "\""; } ?>>
									<label for="passwd">Password: </label>
									<input type="password" id="passwd" name="pass1" placeholder="Your password">
									<label for="passwd-cf">Confirm password: </label>
									<input type="password" id="passwd-cf" name="pass2" placeholder="confirm your password">
									<div class="center">
										<input type="submit" name="submit" value="Save User Details">
										<?php if (!empty($update_error)) { echo '<br><span class="error">' . $update_error . '</span>';} ?>
									</div>
								</form>
							</div>
						</div>
				</div>

				<!-- Container for address form -->
				<div class="row">
					<div class="column-12">
						<div class="form-holder">
							<form id="address-form" method="post" action="">
								<label for="street-address">Street Address: </label>
								<input type="text" id="street-address" name="street_address" placeholder="123 Example Avenue" required <?php if ($street_address){ echo "value=\"" . $street_address . "\""; } ?>>
								<label for="city">City: </label>
								<input type="text" id="city" name="city" placeholder="Edinburgh" required <?php if ($city){ echo "value=\"" . $city . "\""; } ?>>
								<label for="postcode">Postcode: </label>
								<input type="text" id="postcode" name="postcode" placeholder="EH12 33FP" required <?php if ($postcode){ echo "value=\"" . $postcode . "\""; } ?>>
								<div class="center">
									<input type="submit" name="submit" value="Save This Address">
								</div>
							</form>
						</div>
					</div>
				</div>

				<!-- Container for previous deliveries -->
				<div class="row">
					<div class="column-12">
						<h2 class="center">Previous Deliveries</h2>
						<?php if (!empty($order_err)) { echo '<br><span class="error">' . $order_err . '</span>';} ?>
						<table class="delivery-table">
							<tr>
								<th>ID</th>
								<th>Date</th>
								<th>Total Price</th>
								<th>Contains</th>
								<th>Address</th>
								<th>Status</th>
							</tr>
							<?php BuildTable($orders) ?>
						</table>
					</div>
				</div>

			</div>
		</div>