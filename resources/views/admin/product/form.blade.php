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
        <form class="form-horizontal" method="post" enctype="multipart/form-data" action="@if(isset($product)){{ route('products.update', $product) }}@else{{ route('products.store') }}@endif">
            @csrf
            @if(isset($product))
                @method('put')
            @endif
            
            <div class="card-body">
                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Найменование</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="name" id="name" @isset($product)value="{{ $product->name }}"@endisset placeholder="Введите наименование продукта">
                        @include('includes.error', ['field' => 'name'])
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name_en" class="col-sm-2 col-form-label">Найменование EN</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="name_en" id="name_en" @isset($product)value="{{ $product->name_en }}"@endisset placeholder="Введите наименование продукта En">
                        @include('includes.error', ['field' => 'name_en'])
                    </div>
                </div>
                <div class="form-group row">
                    <label for="code" class="col-sm-2 col-form-label">Код</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="code" id="code" @isset($product)value="{{ $product->code }}"@endisset placeholder="Введите код продукта">
                        @include('includes.error', ['field' => 'code'])
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
                        @include('includes.error', ['field' => 'description'])
                    </div>
                </div>
                <div class="form-group row">
                    <label for="description_en" class="col-sm-2 col-form-label">Описание EN</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="description_en" id="description_en" @isset($product)value="{{ $product->description_en }}"@endisset placeholder="Введите описание продукта EN">
                        @include('includes.error', ['field' => 'description_en'])
                    </div>
                </div>
                <div class="form-group row">
                    <label for="price" class="col-sm-2 col-form-label">Цена</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="price" id="price" @isset($product)value="{{ $product->price }}"@endisset placeholder="Введите цену продукта">
                        @include('includes.error', ['field' => 'price'])
                    </div>
                </div>
                <div class="form-group row">
                    <label for="count" class="col-sm-2 col-form-label">Количество</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="count" id="count" @isset($product)value="{{ $product->count }}"@endisset placeholder="Введите количество продукта">
                        @include('includes.error', ['field' => 'count'])
                    </div>
                </div>
                <div class="form-group row">
                    <label for="image" class="col-sm-2 col-form-label">Изображение</label>
                    <div class="col-sm-10">
                        @isset($product)
                            <img style="width: 100px;height:100px;background:transparent" src="{{ Storage::url($product->image) }}" alt="{{$product->name}}">
                        @endisset
                        <input type="file" name="image" id="image">
                        @include('includes.error', ['field' => 'image'])
                    </div>
                </div>
                @foreach(['new'=>'Новинка', 'hit'=>'Хит', 'recomend'=>'Рекомендуем'] as $field=>$name)
                <div class="form-group row">
                    <label for="{{$field}}" class="col-sm-2 col-form-label">{{$name}}</label>
                    <div class="col-sm-10">
                        <input type="checkbox" name="{{$field}}" id="{{$field}}" placeholder="Введите наименование продукта"
                        @if(isset($product) && $product->$field === 1) checked='checked' @endif >
                    </div>
                </div>
                @endforeach
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-success">Сохранить</button>
            </div>
        </form>
    </div>
@endsection