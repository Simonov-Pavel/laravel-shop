@extends('layouts.panel')
@section('panel', 'Админ панель')
@section('title', 'Админ панель - Продукты')
@section('menu')
@include('includes.admin-menu')
@endsection
@section('content')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Продукты</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin') }}">Главная</a></li>
                        <li class="breadcrumb-item active">Продукты</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div>
        <a href="{{ route('products.create') }}" class="btn btn-primary">Добавить продукт</a>
    </div>
    <div class="card-body p-0">
        <table class="table table-hover text-nowrap">
            <thead>
                <tr>
                    <th style="width: 10px">№</th>
                    <th>Изображение</th>
                    <th>Найменование</th>
                    <th>Код</th>
                    <th>Категория</th>
                    <th>Праис</th>
                    <th>Количество</th>
                    <th>Действие</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                <tr>
                    <td>{{$product->id}}</td>
                    <td><img style="width: 100px;height:100px;background:transparent" src="{{Storage::url($product->image)}}"></td>
                    <td>{{$product->name}}</td>
                    <td>{{$product->code}}</td>
                    <td>{{$product->category->name}}</td>
                    <td>{{$product->price}}</td>
                    <td>
                    
                        @if($product->deleted_at)
                            <a class="btn btn-primary" href="">Востановить?</a>
                            </br>
                            </br>
                            <form action="{{ route('products.destroy', $product) }}" method="post">
                                @csrf 
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Удалить?</button>
                            </form>
                        @else {{$product->count}}
                        @endif
                    
                    </td>
                    <td>
                    <form action="{{ route('products.destroy', $product) }}" method="post">
                        <a href="{{route('products.show', $product)}}" class="btn btn-tool"><i class="fas fa-eye text-success"></i></a>
                        <a href="{{route('products.edit', $product)}}" class="btn btn-tool"><i class="fas fa-pen text-primary"></i></a>
                        
                        @csrf 
                        @method('DELETE')
                        <button type="submit" style="background:transparent; border:none"><i class="fas fa-times text-danger"></i></button>
                    </form>
                        
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection