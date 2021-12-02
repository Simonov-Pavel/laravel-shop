@extends('layouts.main')

@section('title', 'Продукт ' . $product->name)

@section('content')

        <h1>{{ $product->__('name') }}</h1>
        <h2>{{$product->category->__('name')}}</h2>
        <p>Price: <b>{{$product->price}} {{App\Services\Currency\CurrencyConversion::getCurrencySymbol()}}</b></p>
        <img src="{{ Storage::url($product->image) }}">
        <p>{{$product->__('description')}}</p>
        @if($product->isAvailable())
            <form action="{{route('bascet-add', $product)}}" method="POST">
                @csrf
                <button type="submit" class="btn btn-success" role="button">В корзину</button>
            </form>
        @else
            <span><h3>Недоступен для заказа</h3></span><br>
            <span><b>Сообщить мне о поступлении этого товара</b></span><br>
             <form action="{{ route('subscript', $product) }}" method="post">
                @include('includes.error', ['field' => 'email'])
                 @csrf
                 <input type="email" name="email" @error('email') style="border-color: #f00" value="{{ old('email') }}" @enderror>
                 <button type="submit">Отравить</button>
                 
             </form>
        @endif
                  
        

@endsection