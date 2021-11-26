<div class="col-sm-6 col-md-4">
    <div class="thumbnail">
        <div class="labels">
            @if($product->isNew())
                <span class="badge badge-success">@lang('main.new')</span>
            @endif
            @if($product->isHit())
                <span class="badge badge-warning">@lang('main.hit')</span>
            @endif
            @if($product->isRecomend())
                <span class="badge badge-danger">@lang('main.recommend')</span>
            @endif
        </div>
        <img src="{{Storage::url($product->image)}}">
        <div class="caption">
            <h3>{{$product->name}}</h3>
            <p>{{$product->price}} ₽</p>
            <p>
                <form action="{{route('bascet-add', $product)}}" method="POST">
                    @csrf
                    @if($product->isAvailable())
                        <button type="submit" class="btn btn-primary" role="button">@lang('main.in_bascet')</button>
                    @else
                    @lang('main.not_order')
                    @endif
                    <a href="{{route('product', [isset($category) ? $category->code : $product->category->code, $product->code])}}" class="btn btn-default" role="button">@lang('main.details')</a>
                </form>
                
            </p>
        </div>
    </div>
</div>