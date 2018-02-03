// create order as an empty array
var order = [];

// create menu items
var supreme = {"name": "Supreme", "img": "supreme.jpeg", "price": "£7.00", "var": "supreme"};
var chickenSupreme = {"name": "Chicken Supreme", "img": "chicken_supreme.jpeg", "price": "£7.50", "var": "chickenSupreme"};
var italian = {"name": "Italian", "img": "italian.jpeg", "price": "£6.00", "var": "italian"};
var oliveSweet = {"name": "Olive & Sweetcorn", "img": "olive_sweetcorn.jpeg", "price": "£4.50", "var": "oliveSweet"};
var create = {"name": "Create Your Own", "img": "create.jpeg", "price": "£4.50", "var": "create"};
var half = {"name": "Half and Half", "img": "half.jpeg", "price": "£5.50", "var": "half"};

// add item to sidebar shopping cart
function addToOrder(item) {
	order.push(item);
	updateCart();
};

// remove item from sidebar shopping cart
function removeFromOrder(item) {
	order.splice(order.indexOf(item), 1);
	updateCart();
};

// draw cart items into shopping cart sidebar
function updateCart() {
	// calculate the total price
	var totalPrice = 0;
	for (var i = 0; i < order.length; i++) {
		totalPrice += parseFloat(order[i].price.substring(1));
	}

	// add the price to the price element
	var priceEl = document.getElementById("total-price");
	var link = document.getElementById("checkout");
	if (totalPrice > 0) {
		// unhide price element and add value 
		priceEl.classList.remove('hidden');
		link.classList.remove('inactive');
		priceEl.innerHTML = "£" + totalPrice.toFixed(2);

	} else {
		// hide price element
		priceEl.classList.add('hidden');
		link.classList.add('inactive');
	}

	// create an empty element to be filled with the order content
	var orderContents = "";
	
	// loop through order array appending an <li> for each item
	for (var i = 0; i < order.length; i++) {
		orderContents += "<li class=\"basket-item\">";
		orderContents += "<img class=\"basket-img\" src=\"./img/" + order[i].img + "\">";
		orderContents += "<span class=\"basket-name\">" + order[i].name + ": " + order[i].price + "</span>";
		orderContents += "<img src=\"./img/cancel.png\" class=\"basket-button\" onClick=\"removeFromOrder(" + order[i].var + ")\">";
		orderContents += "</li>";
	}

	// find the list of basket items
	var basketList = document.getElementById("basket-list");

	// append the filled element 
	basketList.innerHTML = orderContents;

};

// move to the checkout page while retaining the order items
function checkout(order) {
	// save the order array to session storage
	sessionStorage.setItem('order', JSON.stringify(order));
	// go to checkout page
	window.location.href = './order/order.php';
}

// remove item from order while on the checkout page
function removeFromCheckout(item) {
	// remove item from order at checkout stage
	order.splice(item, 1);
	sessionStorage.setItem('order', JSON.stringify(order));
	menuDraw();
}

// draw order items onto the checkout page
function menuDraw() {
	var orderContents = "";
	var orderItems = [];

	// get the contents of the order from session storage
	order = JSON.parse(sessionStorage.getItem('order'));	

	if (order.length < 1) {
		window.location.replace('index.php');
	}

	// loop through the array of order items, generating the <li> for each one
	for (var i = 0; i < order.length; i++) {
		orderContents += "<li class=\"checkout-item\">";
		orderContents += "<img class=\"checkout-img\" src=\"../img/" + order[i].img + "\">";
		orderContents += "<br><span class=\"checkout-name\">" + order[i].name + ": " + order[i].price + "</span><br>";
		orderContents += "<img src=\"../img/cancel.png\" class=\"checkout-button\" onClick=\"removeFromCheckout(" + i + ")\">";
		orderContents += "</li>";
		orderItems.push(order[i].name);
	}
	document.getElementById('items-field').value = orderItems;

	// calculate the total price
	var totalPrice = 0;
	for (var i = 0; i < order.length; i++) {
		totalPrice += parseFloat(order[i].price.substring(1));
	}
	document.getElementById('price-field').value = totalPrice;

	// add the total price to the checkout page
	var priceEl = document.getElementById("total-price");
	priceEl.innerHTML = "£" + totalPrice.toFixed(2);

	// find the list of order items on checkout page
	var basketList = document.getElementById("order-list");

	// append the filled element 
	basketList.innerHTML = orderContents;
}

function drawForm() {
	var orderItems = [];

	// get the contents of the order from session storage
	order = JSON.parse(sessionStorage.getItem('order'));	

	// loop through the array of order items
	for (var i = 0; i < order.length; i++) {
		orderItems.push(order[i].name);
	}
	document.getElementById('items-field').value = orderItems;

	// calculate the total price
	var totalPrice = 0;
	for (var i = 0; i < order.length; i++) {
		totalPrice += parseFloat(order[i].price.substring(1));
	}
	document.getElementById('price-field').value = totalPrice;
}

function logOrder() {
	// log contents of order storage
	console.log(sessionStorage.getItem('order'));
}

function showLogin() {
	// display login form
	var logEl = document.getElementById("login-form");
	logEl.classList.add('visible');
}

window.onclick = function(event) {
	if (!window.location.pathname.includes('admin.php')) {
		var logEl = document.getElementById("login-form");
	    if (event.target == logEl) {
	        logEl.classList.remove('visible');
	    }
	}
}

function loginSwitch() {
	var loginPanel = document.getElementById("modal-login");
	if (loginPanel.classList.contains('hidden')) {
		var signupPanel = document.getElementById("modal-signup");
		var loginTab = document.getElementById("login-tab");
		var signupTab = document.getElementById("signup-tab");
		loginPanel.classList.remove('hidden');
		signupPanel.classList.add('hidden');
		loginTab.classList.add('active');
		signupTab.classList.remove('active');
	}
}

function signupSwitch() {
	var signupPanel = document.getElementById("modal-signup");
	if (signupPanel.classList.contains('hidden')) {
		var loginPanel = document.getElementById("modal-login");
		var loginTab = document.getElementById("login-tab");
		var signupTab = document.getElementById("signup-tab");
		signupPanel.classList.remove('hidden');
		loginPanel.classList.add('hidden');
		signupTab.classList.add('active');
		loginTab.classList.remove('active');
	}
}

function goToUser(user_id) {
	window.location.replace('./admin-user.php?id=' + user_id);
}

function deleteUser(user_id) {
	if (confirm("Are you sure you want to delete this user?")) {
		window.location.replace('./admin-delete.php?id=' + user_id);
	}
}

function adminReturn() {
	window.location.replace('./backoffice.php');
}