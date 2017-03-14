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
             {!! Form::open(['url' => 'product/addCart']) !!}
             <input type="text" class="hidden" name="id" value="{{$product->id}}" />
             <div>
             <label>Jumlah</label>
             {!! Form::text('quantity', null, ['class' => 'form-control', 'id'=>'quantity', 'size'=>'5','placeholder'=>'jumlah barang']) !!}
            </div>  

            <div class="panel-footer">
               {!! Form::submit('add', ['class' => 'btn btn-primary', 'name' => 'save' ])!!}
            </div>
             {!! Form::close() !!}
        </div>
    </div>
@endforeach
     </div>
        <div class="list-group">
            {!! $products->render() !!}
        </div>
    </div>
</section>