@extends('layouts.master')


@section('content')

    <h1>New Article</h1>
    <a href="{{ route('author.create') }}" class="btn btn-success">New Post</a>

    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">title</th>
            <th scope="col">info</th>
            <th scope="col">price</th>
            <th scope="col"> actions </th>
          </tr>
        </thead>
        <tbody>
          @foreach($products as $product)
            <tr>
                <th scope="row"> {{ $product->id }} </th>
                <td> {{ $product->title }} </td>
                <td> {{ $product->info }} </td>
                <td> {{ $product->price }} </td>
                <td> 
                <a href="{{ route('product.delete', $product->id) }}" onclick="return confirm('Do you wanna delete?')">Delete</a>
                </td>
            </tr>
          @endforeach
        </tbody>
      </table>

@endsection