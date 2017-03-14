@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Transactions</div>

                <div class="panel-body">
                     @foreach($trans as $data)
					    <div class="col-md-3">
					        <div class="panel">
					            <div class="panel-heading">
					                {{ $data->form_id }}
					            </div>
					            <div class="panel-heading">
					                Total Bayar: IDR {{ $data->total_bayar }}
					            </div>
					            <div>
					            	 <a href="{{url('transactions',$data->form_id)}}">Show</a>
					            </div>
					        </div>
					    </div>
					@endforeach
                </div>

                <div class="list-group">
		            {!! $trans->render() !!}
		        </div>
            </div>
        </div>
    </div>
</div>
@endsection
