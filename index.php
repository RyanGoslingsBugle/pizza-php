<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="./css/style.css">
<script type="text/javascript" src="./js/scripts.js"></script>
<title>Pizza Action | A cheery slice from stranded youngsters</title>
</head>

<body>
	
	<!-- Outer container for the full page -->
	<div id="container">

		<!-- Container for the header bar -->
		<?php include './header.php'; ?>

		<!-- Container for page content -->
		<div class="content">

			<!-- Inner container for the main page content -->
			<div class="main">
				<div class="row">
					<div class="menu column-12">

						<div class="pizza-card">
							<div class="card-image-wrap">
								<img class="card-image" src="./img/create.jpeg">
								<span class="card-hover">Create your own pizza from our range of delicious ingredients</span>
							</div>
							<h3 class="card-desc">Create Your Own</h3>
							<p class="card-price">£4.50</p>
							<button class="card-button" onclick="addToOrder(create)">Add to Order</button>
						</div>

						<div class="pizza-card">
							<div class="card-image-wrap">
								<img class="card-image" src="./img/half.jpeg">
								<span class="card-hover">Can't decide? Why not have both?</span>
							</div>
							<h3 class="card-desc">Half and Half</h3>
							<p class="card-price">£5.50</p>
							<button class="card-button" onclick="addToOrder(half)">Add to Order</button>
						</div>

						<div class="pizza-card">
							<div class="card-image-wrap">
								<img class="card-image" src="./img/italian.jpeg">
								<span class="card-hover">Prosciutto, cherry tomatoes and ruccola</span>
							</div>
							<h3 class="card-desc">Italian</h3>
							<p class="card-price">£6.00</p>
							<button class="card-button" onclick="addToOrder(italian)">Add to Order</button>
						</div>

						<div class="pizza-card">
							<div class="card-image-wrap">
								<img class="card-image" src="./img/supreme.jpeg">
								<span class="card-hover">Pepperoni, tomatoes, olives and green peppers</span>
							</div>
							<h3 class="card-desc">Supreme</h3>
							<p class="card-price">£7.00</p>
							<button class="card-button" onclick="addToOrder(supreme)">Add to Order</button>
						</div>

						<div class="pizza-card">
							<div class="card-image-wrap">
								<img class="card-image" src="./img/chicken_supreme.jpeg">
								<span class="card-hover">Chicken, red onions, green pepper and olives</span>
							</div>
							<h3 class="card-desc">Chicken Supreme</h3>
							<p class="card-price">£7.50</p>
							<button class="card-button" onclick="addToOrder(chickenSupreme)">Add to Order</button>
						</div>

						<div class="pizza-card">
							<div class="card-image-wrap">
								<img class="card-image" src="./img/olive_sweetcorn.jpeg">
								<span class="card-hover">Olives, sweetcorn and tomatoes</span>
							</div>
							<h3 class="card-desc">Olive & Sweetcorn</h3>
							<p class="card-price">£4.50</p>
							<button class="card-button" onclick="addToOrder(oliveSweet)">Add to Order</button>
						</div>

					</div>
				</div>
			</div>

			<!-- Inner container for the sidebar content -->
			<div class="sidebar">
				<div class="row">
					<div id="basket" class="column-12">
						<div id="checkout-wrapper">
							<button id="checkout" class="inactive" onClick="checkout(order)"><h3>Checkout</h3><p id="total-price" class="hidden">Total price: </p></button>
						</div>
						<ul id="basket-list">
						</ul>
					</div>
				</div>
			</div>

		</div>

		<!-- Container for the footer -->
		<?php include './footer.php'; ?>
		
	</div>

</body>

</html>