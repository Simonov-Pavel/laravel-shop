<div class="col-sm-6 col-md-4">
    <div class="thumbnail">
        <div class="labels"></div>
        <img src="images/products/iphone_x.jpg" alt="iPhone X 64GB">
        <div class="caption">
            <h3>{{$product->name}}</h3>
            <p>{{$product->price}} ₽</p>
            <p>
                <a href="{{ route('bascet') }}" class="btn btn-primary" role="button">В корзину</a>
                @isset($category)
                {{ $category->name }}
                @endisset
                <a href="http://internet-shop.tmweb.ru/mobiles/iphone_x_64" class="btn btn-default" role="button">Подробнее</a>
            </p>
        </div>
    </div>
</div>