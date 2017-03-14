@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Transactions Pembayaran</div>

                <div class="panel-body">
                	<div class="panel">
					            <table class="table hover">
					            	<thead>
					            		<th>Product ID</th>
					            		<th>Product Name</th>
					            		<th>Product Price</th>
					            		<th>Qty</th>
					            		<th>Total Price</th>
					            	</thead>
					            	<tbody>
					            		 @foreach($trans as $tran)
					            		<tr>
					            			<td>{{$tran->product_id}}</td>
					            			<td>{{$tran->product->name}}</td>
					            			<td>{{$tran->product->price}}</td>
					            			<td>{{$tran->qty}}</td>
					            			<td>{{$tran->total_price}}</td>
					            		</tr>
					            		@endforeach
					            	</tbody>
					            </table>
					        </div>
              
					    <div class="col-md-3">
					        <div class="panel">
					            <div class="panel-heading">
					            <label>Client ID</label>
					                {{ $logTrans->form_id }}
					            </div>
					            <div class="panel-heading">
					            <label>Date Transaction</label>
					                {{ $logTrans->created_at }}
					            </div>
					            <div class="panel-heading">
					            <label>Total bayar</label>
					                IDR {{ $logTrans->total_bayar }}
					            </div>
					            <div>
					    			<a class="btn btn-default check_out" href="{{ url('/product') }}">Continue</a>
					            </div>
					        </div>
					    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
