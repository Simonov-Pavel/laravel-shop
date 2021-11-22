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
                        <li class="breadcrumb-item"><a href="{{ route('admin') }}">Главная</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.orders') }}">Заказы</a></li>
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
                @foreach($order->products as $product)
                
                <tr>
                    <td>{{$product->name}}</td>
                    <td>{{$product->price}} ₽</td>
                    <td>
                        <div class="btn-group form-inline">
                            <form action="#" method="POST">
                                <button type="submit" class="btn btn-danger"><span aria-hidden="true">-</span></button>
                                @csrf                           
                            </form>
                            <span class="badge">{{ $product->pivot->count }}</span>
                            <form action="{{route('bascet-add', $product)}}" method="POST">
                                <button type="submit" class="btn btn-success"><span aria-hidden="true">+</span></button>
                                @csrf                         
                            </form>
                        </div>
                    </td>
                    
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