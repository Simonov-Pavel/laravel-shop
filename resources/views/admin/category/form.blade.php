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
        <form class="form-horizontal" method="post" action="@if(isset($category)){{ route('categories.update', $category) }}@else{{ route('categories.store') }}@endif">
            @csrf
            @method('put')
            <div class="card-body">
                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Категория</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="name" id="name" @isset($category)value="{{ $category->name }}"@endisset placeholder="Введите наименование категории">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="code" class="col-sm-2 col-form-label">Код</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="code" id="code" @isset($category)value="{{ $category->code }}"@endisset placeholder="Введите код категории">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="description" class="col-sm-2 col-form-label">Описание</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="description" id="description" @isset($category)value="{{ $category->description }}"@endisset placeholder="Введите описание категории">
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-success">Сохранить</button>
            </div>
        </form>
    </div>
@endsection