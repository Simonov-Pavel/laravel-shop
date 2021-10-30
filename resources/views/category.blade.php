@extends('layouts.main')

@section('title', $category->name)

@section('content')
<div class="container">
    <div class="starter-template">
    <h1>{{$category->name}}</h1>
    <p>{{$category->description}}</p>
    <div class="row">
        @include('includes.cart-product')
    </div>
@endsection