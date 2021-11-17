@extends('layouts.main')

@section('title', 'Продукт ' . $product->name)

@section('content')

        <h1>{{$product->name}}</h1>
        <h2>{{$product->category->name}}</h2>
        <p>Price: <b>{{$product->price}} ₽</b></p>
        <img src="{{ Storage::url($product->image) }}">
        <p>{{$product->description}}</p>
        <form action="{{route('bascet-add', $product)}}" method="POST">
            @csrf
            <button type="submit" class="btn btn-success" role="button">Add to Cart</button>      
        </form>

@endsection