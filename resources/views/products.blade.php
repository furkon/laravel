@extends('layouts.app')

@section('content')       
<section id="advertisement">
    <div class="container">
        <img src="{{asset('images/shop/advertisement.jpg')}}" alt="" />
    </div>
</section>

<section>
    <div class="container">
     <div class="row">
     @foreach($products as $product)
    <div class="col-md-3">
        <div class="panel">
            <div class="panel-heading">
                {{ $product->price }}
            </div>
            <div class="panel-heading">
                {{ $product->name }}
            </div>
            <div class="panel-body">
                {{ $product->description }}
            </div>
            <div class="panel-body">
                Stok: {{ $product->stok }}
            </div>
            <div class="panel-footer">
                <a class="btn btn-info pull-right" href="{{ url('product/cart/'.$product->id) }}"><i class="fa fa-shopping-cart"></i> add to cart</a>
                
            </div>
        </div>
    </div>
@endforeach
     </div>
    </div>
</section>
@endsection
