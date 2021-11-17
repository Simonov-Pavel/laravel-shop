@extends('layouts.main')

@section('title', $category->name)

@section('content')

    <h1>{{$category->name}}</h1>
    <p>{{$category->description}}</p>
    <div class="row">
        @if($category->products->count() > 0)
            @foreach($category->products as $product)
                @include('includes.cart-product', compact('product'))
            @endforeach
        @else
            <h3>В этой категории пока нет продуктов... </h3>
        @endif
    </div>
@endsection