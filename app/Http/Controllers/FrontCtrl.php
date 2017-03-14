<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Transaction;
use App\Http\Requests;
use Response;
use Cart;

class FrontCtrl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $products = Product::orderBy('created_at', 'desc')->paginate(2);
        // dd($products);
        return view('fronts.products')->with('products', $products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // $formid       = $request->get('nama_pembeli');
        $formid       = str_random();
        $quantity  =$request->get('quantity');
        $cart_content = Cart::content(1);

        foreach ($cart_content as $cart) {

            $transaction  = new Transaction();

            $product = Product::find($cart->id);

            $transaction->product_id  = $cart->id;
            // $transaction->form_id     = $request->user()->name;
            $transaction->form_id     = $formid;
            $transaction->qty         = $cart->qty;
            $transaction->total_price = $cart->price * $cart->qty;
            $transaction->status      = 'unpaid';
            
            $transaction->save();
        }

        Cart::destroy();
         return redirect('/transactions/'.$formid);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function addCart(Request $request){
        $id = $request->get('id');
        $quantity = $request->get('quantity');
        if($quantity==''){
            $quantity=1;
        }
        // dd($quantity);
        $product = Product::find($id);

        $id          = $product->id;
        $name        = $product->name;
        $price       = $product->price;
        $qty         = $quantity;
        $data = array('id'          => $id, 
                      'name'        => $name, 
                      'qty'         => $qty, 
                      'price'       => $price, 
                      'options'     => array('size' => 'large'));
        // dd($data);

        Cart::add($data);

        $cart = Cart::content(1);
        return view ('fronts.cart')->with('cart', $cart);
    }

    public function productLists(){
        $products = Product::orderBy('id', 'acs')->get();
        return Response::json($products, 200);
    }

}
