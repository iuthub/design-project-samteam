@extends('layouts.master')

@section('title')
    Shop
@endsection

@section('content')
@if(Session::has('success'))
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4 col-sm-offset-3">
            <div id="charge-message" class="alert alert-success">
                {{Session::get('success')}}
            </div>
        </div>
    </div>
@endif
<br>
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="/watches1.jpg" alt="First slide">
      <div class="carousel-caption d-none d-md-block">
    <h1 class="txtcar">Brand new watch</h1>
    <p class="txtcar">SWatch, AppleWatch, Hubolt, G Shock</p>
  </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="/watches4.jpg" alt="Second slide">
        <div class="carousel-caption d-none d-md-block">
    <h1 class="txtcar">Discounts upto -70%</h1>
    <p class="txtcar">From 50%-70%</p>
  </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="/watches3.jpg" alt="Third slide">
       <div class="carousel-caption d-none d-md-block">
    <h1 class="txtcar">Don't loose your chance!</h1>
  </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<hr>

<div class="hello">
 <p class="desc"> AVAILABLE NOW</p>
</div>

@foreach ($products->chunk(3) as $productChunk)
    <div class="row">
        @foreach ($productChunk as $product)
            <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                    <div class="img"><img src="{{$product->imagePath}}" alt="..." class="img-thumbnail"></div>
                        <div class="card-body">
                            <h3>{{$product->title}}</h3>
                            <p class="card-text">{{$product->info}}</p>
                            <div class="d-flex justify-content-between align-items-center">
                            <div class="pull-left price">${{$product->price}}</div>
                            <a href="{{route('product.addToCart', ['id'=>$product->id])}}" class="btn btn-success pull-right" role="button">Add to Cart</a>
                            </div>
                        </div>
                    </div>
            </div>
        @endforeach
    </div>
@endforeach

@endsection
