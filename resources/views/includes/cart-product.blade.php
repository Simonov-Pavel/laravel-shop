<div class="col-sm-6 col-md-4">
    <div class="thumbnail">
        <div class="labels">
            @if($product->isNew())
                <span class="badge badge-success">Новинка</span>
            @endif
            @if($product->isHit())
                <span class="badge badge-warning">Хит</span>
            @endif
            @if($product->isRecomend())
                <span class="badge badge-danger">Рекомендуем</span>
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
                        <button type="submit" class="btn btn-primary" role="button">В корзину</button>
                    @else
                        Недоступен для заказа
                    @endif
                    <a href="{{route('product', [isset($category) ? $category->code : $product->category->code, $product->code])}}" class="btn btn-default" role="button">Подробнее</a>
                </form>
                
            </p>
        </div>
    </div>
</div>