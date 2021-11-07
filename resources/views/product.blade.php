@extends('layouts.main')

@section('title', 'Продукт ')

@section('content')

        <h1>{{$product->name}}</h1>
        <h2>{{$product->category->name}}</h2>
        <p>Price: <b>{{$product->price}} ₽</b></p>
        <img src="http://internet-shop.tmweb.ru/storage/products/iphone_x_silver.jpg">
        <p>{{$product->description}}</p>
        <form action="{{ route('bascet') }}" method="POST">
            <button type="submit" class="btn btn-success" role="button">Add to Cart</button>
                    
        </form>

@endsection