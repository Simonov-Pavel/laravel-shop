@extends('layouts.panel')
@section('panel', 'Админ панель')
@if(isset($product))
    @section('title', 'Админ панель - Редактирование продукта ' . $product->name)
@else
    @section('title', 'Админ панель - Добавление продукта')
@endif

@section('menu')
@include('includes.admin-menu')
@endsection
@section('content')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">
                        @if(isset($product))
                            Редактирование продукта <b>{{ $product->name }}</b>
                        @else
                            Добавление продукта
                        @endif
                    </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin') }}">Главная</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('products.index') }}">Продукты</a></li>
                        @if(isset($product))
                            <li class="breadcrumb-item"><a href="{{ route('products.show',$product) }}">{{$product->name}}</a></li>
                            <li class="breadcrumb-item active">Редактирование</li>
                        @else
                            <li class="breadcrumb-item active">Добавление продукта</li>
                        @endif
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <form class="form-horizontal" method="post" action="@if(isset($product)){{ route('products.update', $product) }}@else{{ route('products.store') }}@endif">
            @csrf
            @if(isset($product))
                @method('put')
            @endif
            
            <div class="card-body">
                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Найменование</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="name" id="name" @isset($product)value="{{ $product->name }}"@endisset placeholder="Введите наименование продукта">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="code" class="col-sm-2 col-form-label">Код</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="code" id="code" @isset($product)value="{{ $product->code }}"@endisset placeholder="Введите код продукта">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Категория</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="category_id">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" 
                                @isset($product)  
                                    @if($product->category_id == $category->id) selected="selected" @endif 
                                @endisset>
                                {{$category->name}}</option>
                            @endforeach
                        </select >    
                    </div>
                </div>
                <div class="form-group row">
                    <label for="description" class="col-sm-2 col-form-label">Описание</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="description" id="description" @isset($product)value="{{ $product->description }}"@endisset placeholder="Введите описание продукта">
                    </div>
                </div>
                
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-success">Сохранить</button>
            </div>
        </form>
    </div>
@endsection