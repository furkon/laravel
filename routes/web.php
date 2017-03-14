<?php

use App\Product;
use App\Transaction;
use App\TransactionLogs;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::resource('/product', 'FrontCtrl');

Route::get('/products', function()
{
	$products = Product::all();
	return View::make('products')->with('products', $products);
});
// Route::get('product/addCart/{id}', 'FrontCtrl@addCart');
Route::post('product/addCart', 'FrontCtrl@addCart');
Route::get('cart/checkout', 'FrontCtrl@checkOut');
Route::get('products-list', 'FrontCtrl@productLists');
// Route::get('cart/update/{id}', 'FrontCtrl@update');
Route::get('cart/delete/{id}' , function($id){
	Cart::remove($id);
	$cart = Cart::content(1);
	return View::make('fronts.cart')->with('cart', $cart);
});

// Route::post('cart/update/{id}' , function(Request $request, $id){
// 	$data = array(
// 			'qty' =>$request->post('qty'),
// 		);
// 	Cart::update($data);
// 	$cart = Cart::content(1);
// 	return View::make('fronts.cart')->with('cart', $cart);
// });
// Route::get('cart/update/{id}' , function(Request $request, $id ){
// 	$data = array(
// 			'id' =>$cart->id,
// 			'qty' =>$request->get('qty');
// 		);
// 	Cart::update($data);
// 	$cart = Cart::content(1);
// 	return View::make('fronts.cart')->with('cart', $cart);
// });
// Route::get('product/cart/{id}', function($id){
// 		$product = Product::find($id);

// 		$id          = $product->id;
// 		$name        = $product->name;
// 		$qty         = 1;
// 		$price       = $product->price;

// 		$data = array('id'          => $id, 
// 					  'name'        => $name, 
// 					  'qty'         => $qty, 
// 					  'price'       => $price, 
// 					  'options'     => array('size' => 'large'));

// 		Cart::add($data);

// 		$cart = Cart::content(1);
// 		return View::make('cart')->with('cart', $cart);
// });

// Route::get('cart/checkout' , function(Request $request){
			
// 		$formid       = str_random();
// 		$cart_content = Cart::content(1);

// 		foreach ($cart_content as $cart) {

// 			$transaction  = new Transaction();
// 			// $transactionLogs = new Transactionlogs();

// 			$product = Product::find($cart->id);

// 			$transaction->product_id  = $cart->id;
// 			// $transaction->form_id     = $request->user()->name;
// 			$transaction->form_id     = $formid;
// 			$transaction->qty         = $cart->qty;
// 			$transaction->total_price = $cart->price * $cart->qty;
// 			$transaction->status      = 'unpaid';

// 			// $transactionLogs->form_id 	= $formid;
// 			// $transactionLogs->total 	= Cart::total();
			
// 			$transaction->save();
// 			// $transactionLogs->save();

// 		}

// 		Cart::destroy();

// 		echo "Checkout berhasil";
// 		return redirect('/product');
// });

Route::get('cart/update/{id}' , function(Request $request, $id){
	
		
		$cart_content = Cart::content(1);

		foreach ($cart_content as $cart) {

			$product = Product::find($cart->id);
		// dd($product);

			$data = array(
					'id' => $cart->id,
					'qty' => $request->get('qty'),
				);
		}

		Cart::add($data);

		echo "update berhasil";
		return redirect('/product');
});

Route::get('cart/clear-cart' , function(){
			
		$formid       = str_random();
		$cart_content = Cart::content(1);

		Cart::destroy();

		echo "clear cart berhasil";
		return redirect('/product');
});

Auth::routes();
Route::resource('transactions', 'TransactionCtrl');

Route::get('/home', 'HomeController@index');
