@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1 class="smalltxt1">Profile Orders</h1>
            @foreach ($orders as $order)
                <div class="panel panel-default">
                    <div class="panel-body">
                            <ul class="list-group">
                                @foreach ($order->cart->items as $item)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                        {{$item['item']['title']}} | {{$item['qty']}} Item
                                        <span class="badge badge-primary badge-pill">{{$item['price']}}$</span>
                                    </li>
                                    @endforeach
                            </ul>
                    </div>
                    <div class="panel-footer">
                        <div class="smalltxt1">
                        <strong>Total Price: {{$order->cart->totalPrice}} $</strong>
                        </div>
                    </div>
                </div>
                @endforeach
        </div>
    </div>
@endsection