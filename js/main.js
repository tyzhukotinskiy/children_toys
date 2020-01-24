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
	sum += cart[key]["quantity"];
}
count_products.innerHTML = sum;
$('.basket_add').on('click', basket_add);
function basket_add(){
	var last_product_in_order_id = 1;
	var id = $(this).attr('data-id');
	var title = $(this).attr('data-title');
	var price = $(this).attr('data-price');
	var new_product = true;
	for(key in cart){
		if(cart[last_product_in_order_id]["id"] == id){ new_product = false; break; }
		last_product_in_order_id++;
	}
	console.log(last_product_in_order_id);
	sum = 0;
	if(new_product)cart[last_product_in_order_id] = {'id': id, 'title': title, 'price': price};
	if(cart[last_product_in_order_id]["quantity"]){
		cart[last_product_in_order_id]["quantity"]++;
	}
	else {
		cart[last_product_in_order_id]["quantity"] = 1;
	}


	console.log(cart);
	cart_str = JSON.stringify(cart);
	console.log(cart_str);
	localStorage.setItem('basket', cart_str);
	for(key in cart){
		sum += cart[key]["quantity"];
	}
	count_products.innerHTML = sum;
	console.log(cart);
}

/* ------------ Modal window for basket ------------ */

let $mdb = $("#cart_body");
let modal_basket = document.getElementsByClassName('modal_basket')[0];
function plus_product(e){
	var quantity = document.getElementsByClassName('product_quantity');
	quantity[$(e).attr('data-productId')].value = ++quantity[$(e).attr('data-productId')].value;
	for(key in cart){
		if(cart[key]['title'] == $(e).attr('data-title')) cart[key]['quantity']++;
	}
	localStorage.setItem('basket', JSON.stringify(cart));
	count_products.innerHTML++;
	getAllPrice();
}
function minus_product(e){
	var quantity = document.getElementsByClassName('product_quantity');
	if(quantity[$(e).attr('data-productId')].value>0){quantity[$(e).attr('data-productId')].value = --quantity[$(e).attr('data-productId')].value;
	for(key in cart){
		if(cart[key]['title'] == $(e).attr('data-title')) cart[key]['quantity']--;
	}
	localStorage.setItem('basket', JSON.stringify(cart));
	count_products.innerHTML--;}
	getAllPrice();
}
function getAllPrice(){
	var sum = 0;
	for(key in cart){
		sum += Number(cart[key]['price'])*cart[key]['quantity'];
	}
	$('.allPrice span').text(sum);
}
function ModalBasket(){
$mdb.html("<h4>Перечень выбранных товаров: </h4><p>Пользуйтесь пожалуйста переключателями \"+\" \"-\"</p><p onclick=\"ModalBasket()\">Закрыть корзину</p>");
	modal_basket.style.display = modal_basket.style.display == 'flex' ? 'none' : 'flex';

	for(key in cart){
		$mdb.append("<div class='product_item'><p>Количество: <input type='text' name='product_quantity' class='product_quantity'  value='"+cart[key]['quantity']+"'>" +
			"<button class='plus_product' data-title='"+(cart[key]['title'])+"' data-productId='"+(key-1)+"' onclick='plus_product(this)'>+</button>" +
			"<button class='minus_product' data-title='"+(cart[key]['title'])+"' data-productId='"+(key-1)+"' onclick='minus_product(this)'>-</button></p>" +
		"<p>Название товара: " + cart[key]['title'] + "</p>"+
		"<p>Цена товара:"+ cart[key]['price'] +" грн.</p>"+
		"</div>");
	}
	$mdb.append("<p class='allPrice'>Общая цена заказа: <span></span> грн.</p>");
	$mdb.append("<button class='add_order'>Оформить заказ</button>")
	getAllPrice();
}

/* ------------ Message background_color ----------- */

if($(".message.registration")){
var registration_message = $(".message.registration p");
if(registration_message[0].innerHTML == "Регистрация прошла успешно, можете авторизоваться!"){
	registration_message[0].parentNode.className = "message registration green";
}}

/* ------------ Login account ajax ----------- */
function authUser(){

$.ajax({
	url:     '/children_toys/user/auth/', //url страницы (action_ajax_form.php)
	type:     "POST", //метод отправки
	data: "login="+auth_login.value+"&password="+auth_password.value+"&auth=auth",  // Сеарилизуем объект
	success: function(response) { //Данные отправлены успешно
		$(".auth_message").css('display', 'block');
		if(response == "Авторизация пользователя прошла успешно!") $(".auth_message")[0].className = 'auth_message message green';
		$(".auth_message p").text(response);
	},
	error: function(response) { // Данные не отправлены
		console.log('неизвестная ошибка отправки данных');
	}
});}

/* -------------- User's settings save changes ------------ */

function UserSaveChanges(){
	$.ajax({
		url: '/children_toys/user/settingssave/',
		type: "POST",
		data: "login="+user_login.value+"&first_name="+user_first_name.value+"&last_name="+user_last_name.value+"&email="+user_email.value+"&telephone="+user_telephone.value+"&date_of_birth="+user_date_of_birth.value+"&country="+user_country.value,
		success: function(response) {
			if(response == 'Изменения успешно сохранены!')$(".message_user_save_changes")[0].className = "message message_user_save_changes green";
			else $(".message_user_save_changes")[0].className = "message message_user_save_changes";
			$(".message_user_save_changes").css('display', 'block');
			$(".message_user_save_changes").text(response);
		},
		error: function(respose){
			console.log("Не удалось отправить данные!");
		}
	});
}
