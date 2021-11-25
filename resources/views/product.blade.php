@extends('layouts.main')

@section('title', 'Продукт ' . $product->name)

@section('content')

        <h1>{{$product->name}}</h1>
        <h2>{{$product->category->name}}</h2>
        <p>Price: <b>{{$product->price}} ₽</b></p>
        <img src="{{ Storage::url($product->image) }}">
        <p>{{$product->description}}</p>
        @if($product->isAvailable())
            <form action="{{route('bascet-add', $product)}}" method="POST">
                @csrf
                <button type="submit" class="btn btn-success" role="button">В корзину</button>
            </form>
        @else
            <span><h3>Недоступен для заказа</h3></span><br>
            <span><b>Сообщить мне о поступлении этого товара</b></span><br>
             <form action="" method="post">
                 @csrf
                 <input type="email" name="email">
                 <button type="submit">Отравить</button>
             </form>
        @endif
                  
        

@endsection