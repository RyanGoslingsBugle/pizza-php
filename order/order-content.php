<!-- fetch data for logged in user -->
<?php include '../user/userfetch.php'; ?>
<?php require './orderstore.php'; ?>

<div class="content">

	<div class="full-page">

		<div class="row">
			<div class="column-12 center">
				<div>
					<ul id="order-list"></ul>
				</div>
				<div class="checkout-price">
					<p>Total Price: <span id="total-price"></span></p>
				</div>
			</div>
		</div>
		<!-- Container for address form -->
		<div class="row">
			<div class="column-12 top-border">
				<h2 class="form-title">Please enter the delivery address:</h2>
				<div class="form-holder">
					<form id="address-form" method="post" action="">
						<label for="street-address">Street Address: </label>
						<input type="text" id="street-address" name="street_address" placeholder="123 Example Avenue" <?php if ($street_address){ echo "value=\"" . $street_address . "\""; } ?> required>
						<label for="city">City: </label>
						<input type="text" id="city" name="city" placeholder="Edinburgh" <?php if ($city){ echo "value=\"" . $city . "\""; } ?> required>
						<label for="postcode">Postcode: </label>
						<input type="text" id="postcode" name="postcode" placeholder="EH12 33FP" <?php if ($postcode){ echo "value=\"" . $postcode . "\""; } ?> required>
						<input type="hidden" name="price" id="price-field">
						<input type="hidden" name="items" id="items-field">

						<div class="center">
							<input type="submit" name="submit" value="Buy">
							<?php if (!empty($data_err)) { echo '<br><span class="error">' . $data_err . '</span>';} ?>
						</div>
					</form>
				</div>
			</div>
		</div>

	</div>

</div>