@extends('layouts.panel')
@section('panel', 'Админ панель')
@section('title', 'Админ панель - Заказы')
@section('menu')
@include('includes.admin-menu')
@endsection
@section('content')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Заказы</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin') }}">Главная</a></li>
                        <li class="breadcrumb-item active">Заказы</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="card-body p-0">
        <table class="table table-hover text-nowrap">
            <thead>
                <tr>
                    <th style="width: 10px">№</th>
                    <th>Пользователь</th>
                    <th>Телефон</th>
                    <th>Сумма заказа</th>
                    <th>Действие</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                <tr>
                    <td>{{$order->id}}</td>
                    <td>{{$order->name}}</td>
                    <td>{{$order->phone}}</td>
                    <td>{{$order->calculateFullPrice()}} руб.</td>
                    <td>
                        <a href="{{route('admin.order.show', $order)}}" class="btn btn-tool"><i class="fas fa-eye text-success"></i></a>
                        <a href="#" class="btn btn-tool"><i class="fas fa-times text-danger"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection