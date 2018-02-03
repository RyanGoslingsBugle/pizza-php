<div class="row">
	<div class="column-12">
		<h2 class="center">All Deliveries</h2>
		<?php if (!empty($order_err)) { echo '<br><span class="error">' . $order_err . '</span>';} ?>
		<table class="delivery-table">
			<tr>
				<th>ID</th>
				<th>Date</th>
				<th>User</th>
				<th>Total Price</th>
				<th>Contains</th>
				<th>Address</th>
				<th>Status</th>
			</tr>
			<?php BuildOrdersTable($orders) ?>
		</table>
	</div>
</div>