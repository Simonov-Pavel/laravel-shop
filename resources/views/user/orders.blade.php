@extends('layouts.panel')
@section('title', 'Личный кабинет')
@section('panel', 'Личный кабинет - мои заказы')
@section('menu')
@include('includes.user-menu')
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
                        <li class="breadcrumb-item"><a href="{{ route('user') }}">Главная</a></li>
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
                    <th style="width: 10px">№ заказа</th>
                    <th>Дата заказа</th>
                    <th>Сумма заказа</th>
                    <th>Действие</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                <tr>
                    <td>{{$order->id}}</td>
                    <td>{{$order->created_at}}</td>
                    <td>{{$order->getFullPrice()}}</td>
                    <td>
                        <a href="{{route('orders.show', $order)}}" class="btn btn-tool"><i class="fas fa-eye text-success"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection