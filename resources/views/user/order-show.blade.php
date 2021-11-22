@extends('layouts.panel')
@section('title', 'Личный кабинет - заказ № ' .$order->id)
@section('panel', 'Личный кабинет')
@section('menu')
@include('includes.user-menu')
@endsection
@section('content')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Заказ {{ $order->id }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('user') }}">Главная</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('orders.index') }}">Заказы</a></li>
                        <li class="breadcrumb-item active">Заказ {{ $order->id }}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
<div class="card">
    <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
            <thead>
                <tr>
                    <th>Продукт</th>
                    <th>Цена</th>
                    <th>Количество</th>
                    <th>Сумма</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <td colspan="3" style="text-align:right">Итого:</td>
                    <td>{{$order->calculateFullPrice()}} ₽</td>
                </tr>
            </tfoot>
            <tbody>
            
                @foreach($products as $product)
                <tr>
                    <td>
                        <a href="{{ route('product', [$product->category->code, $product->code]) }}">{{$product->name}}</a>
                    </td>
                    <td>{{$product->price}} ₽</td>
                    <td>{{ $product->pivot->count }}</td>
                    <td>{{$product->getPriceForCount()}} ₽</td>
                </tr>
                @endforeach
                <form action="{{ route('orders.destroy', $order) }}" method="post">
                    @csrf 
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Удалить заказ</button>
                </form>
            </tbody>
        </table>   
    </div>
</div>
@endsection