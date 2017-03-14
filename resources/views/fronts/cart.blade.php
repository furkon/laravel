@extends('layouts.app')

@section('content')       
<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active">Shopping Cart</li>
            </ol>
        </div>
        <div class="table-responsive cart_info">
            @if(count($cart))
            <table class="table table-condensed">
                <thead>
                    <tr class="cart_menu">
                        <td class="image">Item</td>
                        <td class="description"></td>
                        <td class="price">Price</td>
                        <td class="quantity">Quantity</td>
                        <td class="total">Total</td>
                        <td></td>
                    </tr>
                </thead>
                 {!! Form::open(['url' => 'product']) !!}
                <tbody>
                    @foreach($cart as $item)
                    <tr>
                        <td class="cart_product">
                            <a href=""><img src="images/cart/one.png" alt=""></a>
                        </td>
                        <td class="cart_description">
                            <h4><a href="">{{$item->name}}</a></h4>
                            <p>Product ID: {{$item->id}}</p>
                        </td>
                        <td class="cart_price">
                            <p>${{$item->price}}</p>
                        </td>
                       <td class="cart_quantity">
                            <div class="cart_quantity_button">
                                {!! Form::text('qty', $item->qty, ['class' => 'cart_quantity_input', 'id'=>'qty', 'size'=>'2']) !!}
                            </div>
                        </td>
                        <td class="cart_total">
                            <p class="cart_total_price">IDR{{$item->subtotal}}</p>
                        </td>
                        <td class="cart_delete">
                           <a href="{{ url('cart/delete/'.$item->rowid) }}">delete</a>
                           <a href="{{ url('cart/update/'.$item->rowid) }}">Update</a>
                       
                        </td>
                    </tr>
                    @endforeach
                    @else
                <p>You have no items in the shopping cart</p>
                @endif
                </tbody>
            </table>
        </div>
    </div>
</section> <!--/#cart_items-->

<section id="do_action">
    <div class="container">
        <div class="heading">
            <h3>What would you like to do next?</h3>
            <p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="chose_area">
                    <ul class="user_info">
                        
                        <li class="single_field zip-field">
                            <label>Nama Pembeli:</label>
                             {!! Form::text('nama_pembeli', null, ['class' => 'form-control', 'id'=>'nama_pembeli', 'size'=>'5']) !!}
                        </li>
                    </ul>
                     {!! Form::submit('Checkout', ['class' => 'btn btn-primary', 'name' => 'save' ])!!}  
                     {!! Form::close() !!}
                    <a class="btn btn-default check_out" href="{{ url('/product') }}">Continue</a>
                     <a class="btn btn-default update" href="{{url('cart/clear-cart')}}">Clear Cart</a>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="total_area">
                    <ul>
                         <li>Total Daftar Belanja <span>{{Cart::content()->count()}} Barang</span></li>
                        <li>Sub Total <span>IDR{{Cart::total()}}</span></li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</section><!--/#do_action-->
@endsection
