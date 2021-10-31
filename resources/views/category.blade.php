@extends('layouts.main')

@section('title', $category->name)

@section('content')
    <div class="starter-template">
    <h1>{{$category->name}}</h1>
    <p>{{$category->description}}</p>
    <div class="row">
        @foreach($category->products as $product)
            @include('includes.cart-product', compact('product'))
        @endforeach
    </div>
@endsection