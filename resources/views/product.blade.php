@extends('layouts.main')

@section('title', 'Продукт ')

@section('content')
    <div class="starter-template">
        <h1>iPhone X 256GB</h1>
        <h2>Мобильные телефоны</h2>
        <p>Price: <b>89990 ₽</b></p>
        <img src="http://internet-shop.tmweb.ru/storage/products/iphone_x_silver.jpg">
        <p>Отличный продвинутый телефон с памятью на 256 gb</p>
        <form action="http://internet-shop.tmweb.ru/basket/add/2" method="POST">
            <button type="submit" class="btn btn-success" role="button">Add to Cart</button>
            <input type="hidden" name="_token" value="Au89njmajixRjy3GRhAzqETFIKINQndX9YjsdiUz">        
        </form>
    </div>
@endsection