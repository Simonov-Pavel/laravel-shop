@extends('layouts.main')

@section('title', __('main.main'))

@section('content')

    <h1>@lang('main.all_products')</h1>
    <form method="GET" action="{{route('index')}}">
        <div class="filters row">
            <div class="col-sm-6 col-md-3">
                <label for="price_from">@lang('main.price_from')                 
                    <input type="text" name="price_from" id="price_from" size="6" value="{{ request()->price_from }}">
                </label>
                <label for="price_to">@lang('main.to')                   
                    <input type="text" name="price_to" id="price_to" size="6"  value="{{ request()->price_to }}">
                </label>
            </div>
            <div class="col-sm-2 col-md-2">
                <label for="hit">
                    <input type="checkbox" name="hit" id="hit" @if(request()->has('hit')) checked @endif>@lang('main.hit')               
                </label>
            </div>
            <div class="col-sm-2 col-md-2">
                <label for="new">
                    <input type="checkbox" name="new" id="new" @if(request()->has('new')) checked @endif>@lang('main.new')                
                </label>
            </div>
            <div class="col-sm-2 col-md-2">
                <label for="recommend">
                    <input type="checkbox" name="recomend" id="recomend" @if(request()->has('recomend')) checked @endif>@lang('main.recommend')           
                </label>
            </div>
            <div class="col-sm-6 col-md-3">
                <button type="submit" class="btn btn-primary">@lang('main.filter')</button>
                <a href="{{route('index')}}" class="btn btn-warning">@lang('main.reset')</a>
            </div>
        </div>
    </form>
    <div class="row">
        @foreach($products as $product)
            @include('includes.cart-product', compact('product'))
        @endforeach
    </div>
    {{$products->links()}}
    
@endsection
