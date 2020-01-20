var dropdown_catalog = document.getElementsByClassName('dropdown_catalog')[0];
var catalog_arrow = document.getElementsByClassName('catalog_arrow')[0];
var categories = (document.getElementsByClassName('categories'))[0].children;
var subcategories = (document.getElementsByClassName('subcategories'))[0].children;
function showCatalog(){
	dropdown_catalog.style.display = dropdown_catalog.style.display=='flex' ? 'none' : 'flex';
	catalog_arrow.style.transform = dropdown_catalog.style.display=='flex' ? 'rotate(90deg)' : 'none';
	document.getElementsByClassName('background_dark')[0].style.display = dropdown_catalog.style.display=='flex' ? 'block' : 'none';
}
function hover(elem) {
	var subcategory = document.getElementsByClassName('sub_'+elem.className);
	for(var i = 0; i < subcategories.length; i++){
		subcategories[i].style.display = 'none';
	}
	for(var i = 0; i < subcategory.length; i++){
		subcategory[i].style.display = 'block';
	}
}

/* ---------- Modal window for auth ----------- */

var modal_auth = document.getElementsByClassName('modal_login')[0];
function ModalLogin(){

	modal_auth.style.display = modal_auth.style.display == 'flex' ? 'none' : 'flex';
}

/* ---------- Add to basket cart ----------- */

var count_products = document.getElementsByClassName('count_products')[0];
var local_cart = localStorage.getItem('basket');
var cart = JSON.parse(local_cart) !== null ? JSON.parse(local_cart) : {};
var sum = 0;
for(key in cart){
	sum += cart[key];
}
count_products.innerHTML = sum;
sum = 0;
$('.basket_add').on('click', basket_add);
function basket_add(){
	var id = $(this).attr('data-id');
	if(cart[id]){
		cart[id]++;
	} else {
		cart[id] = 1;
	}
	console.log(cart);
	cart_str = JSON.stringify(cart);
	console.log(cart_str);
	localStorage.setItem('basket', cart_str);
	for(key in cart){
		sum += cart[key];
	}
	count_products.innerHTML = sum;
}