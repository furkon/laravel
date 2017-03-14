@extends('layouts.app')

@section('content')       
    <div ng-app="myApp" ng-controller="myController">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">

                        <div class="panel-body">
                            <div class="title-search">
                                <h1>Toko Tok Tok!!!</h1>
                            </div>
                            <div class="col-md-8 col-md-offset-2">
                                <input class="form-control" type="text" ng-model="search" placeholder="cari Barang">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

         <div class="container">
         <div class="row">
            <div class="col-md-3"  dir-paginate="n in index_data | orderBy:sortKey:reverse| filter:search |itemsPerPage:4">
                            <div class="panel">
                                <td>
                                    <label>Nama Barang</label>
                                     <h4><% n.name %></h4>     
                                </td>
                               <td>
                                    <label>Harga</label>   
                                     <p><% n.price | currency: "IDR" %></p>                                
                               </td>
                               <td>
                                    <label>Stok </label>
                                    <p>
                                        <span ng-if="n.stok >= 0">
                                            <% n.stok %>
                                        </span>
                                        <span ng-if="n.stok <= 0">
                                           <i class="fa fa-money"></i> Stok Kosong
                                        </span>
                                    </p>
                               </td>
                               

                                 {!! Form::open(['url' => 'product/addCart']) !!}
                                 <input type="text" class="hidden" name="id" value="<% n.id %>" />
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
         </div>

         <div class="row">
            <dir-pagination-controls
                            max-size="5"
                            direction-links="true"
                            boundary-links="true" >
                        </dir-pagination-controls>     
         </div>
            
        </div>

        
    </div>
@endsection
