@extends('layouts.panel')
@section('panel', 'Админ панель')
@section('title', 'Админ панель - Категории')
@section('menu')
@include('includes.admin-menu')
@endsection
@section('content')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Категории</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin') }}">Главная</a></li>
                        <li class="breadcrumb-item active">Категории</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div>
        <a href="{{ route('categories.create') }}" class="btn btn-primary">Добавить категорию</a>
    </div>
    <div class="card-body p-0">
        <table class="table table-hover text-nowrap">
            <thead>
                <tr>
                    <th style="width: 10px">№</th>
                    <th>Категория</th>
                    <th>Код</th>
                    <th>Действие</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                <tr>
                    <td>{{$category->id}}</td>
                    <td>{{$category->name}}</td>
                    <td>{{$category->code}}</td>
                    <td>
                    <form action="{{ route('categories.destroy', $category) }}" method="post">
                        <a href="{{route('category',[$category->code])}}" class="btn btn-tool"><i class="fas fa-eye text-success"></i></a>
                        <a href="{{route('categories.edit', $category)}}" class="btn btn-tool"><i class="fas fa-pen text-primary"></i></a>
                        
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