@extends('layouts.master')

@section('title')
    Shopping Cart
@endsection

@section('content')
    @if(Session::has('cart'))
        <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                <ul class="list-group">
                    @foreach($products as $product)
                        <li class="list-group-item">
                        <span class="label label-success">Quantity: {{ $product['qty'] }} |</span>
                        <strong>{{$product['item']['title']}}</strong>
                        <span class="label label-success">| {{ $product['price'] }}$</span>
                        <div class="btn-group">
                                <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  Delete
                                </button>
                                <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{route('product.reduceByOne', ['id'=>$product['item']['id']])}}">Reduce by 1</a>
                                  <a class="dropdown-item" href="{{route('product.remove', ['id'=>$product['item']['id']])}}">Remove</a>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
           <div class="smalltxt">
        <div class="row">
         
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                <strong>Total:{{$totalPrice}}$</strong>
            </div>
        </div>
    
        <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
               <a href=" {{route('checkout')}}
               "  class="btn btn-success pull-right" role="button">Checkout</a>
            </div>
        </div></div>
    @else
    <div class="smalltxt1">
    <div class="row"> 
        <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
            <h2>You haven't ordered items</h2>
        </div>
    </div>
</div>
    @endif
@endsection