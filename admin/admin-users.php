<div class="row">
	<div class="column-12">
		<h2 class="center">All Users</h2>
		<?php if (!empty($user_err)) { echo '<br><span class="error">' . $user_err . '</span>';} ?>
		<table class="delivery-table">
			<tr>
				<th>ID</th>
				<th>Email</th>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Adddress</th>
				<th></th>
				<th></th>
			</tr>
			<?php BuildUsersTable($users); ?>
		</table>
	</div>
</div>