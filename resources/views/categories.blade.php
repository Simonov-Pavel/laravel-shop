@extends('layouts.main')

@section('title', 'Все категории')
@section('content')
    <div class="starter-template">
        @foreach($categories as $category)
        <div class="panel">
            <a href="/{{$category->code}}">
                <img src="http://internet-shop.tmweb.ru/storage/categories/mobile.jpg">
                <h2>{{$category->name}}</h2>
            </a>
            <p>{{$category->dascription}}</p>
        </div>
         @endforeach   
    </div>
@endsection