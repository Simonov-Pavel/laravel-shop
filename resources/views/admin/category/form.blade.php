@extends('layouts.panel')
@section('panel', 'Админ панель')
@if(isset($category))
    @section('title', 'Админ панель - Редактирование категории ' . $category->name)
@else
    @section('title', 'Админ панель - Добавление категории')
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
                        @if(isset($category))
                            Редактирование категории <b>{{ $category->name }}</b>
                        @else
                            Добавление категории
                        @endif
                    </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin') }}">Главная</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('categories.index') }}">Категории</a></li>
                        @if(isset($category))
                            <li class="breadcrumb-item"><a href="{{ route('categories.show',$category) }}">{{$category->name}}</a></li>
                            <li class="breadcrumb-item active">Редактирование</li>
                        @else
                            <li class="breadcrumb-item active">Добавление категории</li>
                        @endif
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <form class="form-horizontal" enctype="multipart/form-data" method="post" action="@if(isset($category)){{ route('categories.update', $category) }}@else{{ route('categories.store') }}@endif">
            @csrf
            @if(isset($category))
                @method('put')
            @endif
            
            <div class="card-body">
                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Категория</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="name" id="name" 
                        value="{{ old('name', isset($category)? $category->name : null) }}" placeholder="Введите наименование категории">
                        @include('includes.error', ['field' => 'name'])
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name_en" class="col-sm-2 col-form-label">Категория EN</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="name_en" id="name_en" 
                        value="{{ old('name_en', isset($category)? $category->name_en : null) }}" placeholder="Введите наименование категории EN">
                        @include('includes.error', ['field' => 'name_en'])
                    </div>
                </div>
                <div class="form-group row">
                    <label for="code" class="col-sm-2 col-form-label">Код</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="code" id="code" 
                        value="{{ old('code', isset($category) ? $category->code : null) }}" placeholder="Введите код категории">
                        @include('includes.error', ['field' => 'code'])
                    </div>
                </div>
                <div class="form-group row">
                    <label for="description" class="col-sm-2 col-form-label">Описание</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="description" id="description" 
                        value="{{ old('description', isset($category) ? $category->description : null) }}" placeholder="Введите описание категории">
                        @include('includes.error', ['field' => 'description'])
                    </div>
                </div>
                <div class="form-group row">
                    <label for="description_en" class="col-sm-2 col-form-label">Описание EN</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="description_en" id="description_en" 
                        value="{{ old('description_en', isset($category) ? $category->description_en : null) }}" placeholder="Введите описание категории EN">
                        @include('includes.error', ['field' => 'description_en'])
                    </div>
                </div>
                <div class="form-group row">
                    <label for="image" class="col-sm-2 col-form-label">Изображение</label>
                    <div class="col-sm-10">
                        @isset($category)
                            <img style="width: 100px;height:100px;background:transparent" src="{{ Storage::url($category->image) }}" alt="{{$category->name}}">
                        @endisset
                        <input type="file" name="image" id="image">
                        @include('includes.error', ['field' => 'image'])
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-success">Сохранить</button>
            </div>
        </form>
    </div>
@endsection