function getCart() {
	return JSON.parse($.cookie('cart') || '[]');
}

function setCart(cart) {
	$.cookie('cart', JSON.stringify(cart), {expires: 7, path: '/'});
}

function addCart(id) {
	var cart = getCart();
	var cartE = $('#cart_' + id);
	var qty = $('.cart-qty', cartE).val();
	for(var i = 0; i < qty; i++) {
		cart.push(id);
	}
	setCart(cart);

	$('.add-cart', cartE).hide();
	$('.in-cart', cartE).show();
	$('.cart-qty', cartE).get(0).disabled = true;
	gotoCart();
}
/*
function updateCart(id) {
	var cart = getCart();
	var cartE = $('#cart_' + id);
	cart[id] = $('.cart-qty', cartE).val();
	setCart(cart);
}
*/
function delCart(id) {
	var cart = getCart(), _cart = [];
	for(var i = 0; i < cart.length; i++) {
		if (i != id) {
			_cart.push(cart[i]);
		}
	}
	setCart(_cart);
	$('#xd' + id).parent().remove();
	$('#check_xd' + id).parent().remove();
	// gotoCart();
}

function gotoCart() {
	window.location.href = cartURL;
}
