@extends('layouts.panel')
@section('panel', 'Админ панель')
@section('title', 'Админ панель - Категория ' . $category->name )
@section('menu')
@include('includes.admin-menu')
@endsection
@section('content')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Категория <b>{{$category->name}}</b></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin') }}">Главная</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('categories.index') }}">Категории</a></li>
                        <li class="breadcrumb-item active">{{$category->name}}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="card-body p-0">
        <table class="table table-hover text-nowrap">
            <thead>
                <tr>
                    <th>Поле</th>
                    <th>Значение</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <td>
                        <form action="{{ route('categories.edit', $category) }}" method="get">
                            @csrf
                            <button type='submit' class="btn btn-primary">Редактировать</button>
                        </form>
                    </td>
                </tr>
            </tfoot>
            <tbody>
                <tr>
                    <td>Id</td>
                    <td>{{$category->id}}</td>
                </tr>
                <tr>
                    <td>Категория</td>
                    <td>{{$category->name}}</td>
                </tr>
                <tr>
                    <td>Код</td>
                    <td>{{$category->code}}</td>
                </tr>
                <tr>
                    <td>Описание</td>
                    <td>{{$category->description}}</td>
                </tr>
                <tr>
                    <td>Изображение</td>
                    <td>
                        <img src="/images/products/iphone_x.jpg" alt="iPhone X 64GB">
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection