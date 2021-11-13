@extends('layouts.panel')
@section('title', 'Админ панель - Заказ '. $order->id)
@section('menu')
@include('includes.admin-menu')
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
                    <th>Действие</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <td colspan="4" style="text-align:right">Итого:</td>
                    <td>{{$order->getFullPrice()}}</td>
                </tr>
            </tfoot>
            <tbody>
                @foreach($order->products as $product)
                
                <tr>
                    <td>{{$product->name}}</td>
                    <td>{{$product->price}} ₽</td>
                    <td>{{ $product->pivot->count }}</td>
                    <td>{{$product->getPriceForCount()}} ₽</td>
                    
                    <td>
                        <a href="#" class="btn btn-tool"><i class="fas fa-times text-danger"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
    </div>
@endsection