@extends('layouts.main')

@section('title', 'Корзина')

@section('content')

    <h1>Корзина</h1>
    <p>Оформление заказа</p>
    <div class="panel">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Название</th>
                    <th>Кол-во</th>
                    <th>Цена</th>
                    <th>Стоимость</th>
                </tr>
            </thead>
            <tbody>
                @foreach($order->products as $product)
                <tr>
                    <td>
                        <a href="{{route('product', [$product->category->code, $product->code])}}">
                            <img height="56px" src="{{Storage::url($product->image)}}">
                            {{$product->__('name')}}
                        </a>
                    </td>
                    <td>
                        <div class="btn-group form-inline">
                            <form action="{{route('bascet-remove', $product)}}" method="POST">
                                <button type="submit" class="btn btn-danger"><span  class="glyphicon glyphicon-minus" aria-hidden="true"></span></button>
                                @csrf                           
                            </form>
                            <span class="badge">{{ $product->countInOrder }}</span>
                            <form action="{{route('bascet-add', $product)}}" method="POST">
                                <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></button>
                                @csrf                         
                            </form>
                        </div>
                    </td>
                    <td>{{$product->price}}  {{App\Services\Currency\CurrencyConversion::getCurrencySymbol()}}</td>
                    <td>{{$product->price * $product->countInOrder}}  {{App\Services\Currency\CurrencyConversion::getCurrencySymbol()}}</td>
                </tr>
                @endforeach
                
                <tr>
                    <td colspan="3">Общая стоимость:</td>
                    <td>{{$order->getFullPrice()}}  {{App\Services\Currency\CurrencyConversion::getCurrencySymbol()}}</td>
                </tr>
            </tbody>
        </table>
        <br>
        <div class="btn-group pull-right" role="group">
            <a type="button" class="btn btn-success" href="{{route('order')}}">Оформить заказ</a>
        </div>
    </div>

@endsection