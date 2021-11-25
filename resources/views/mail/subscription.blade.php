<p>Уважаемый клиент, продукт {{$product->name}}  появился в наличии</p>
<br>
<a href="{{ route('product', [$product->category->code, $product->code]) }}">Подробнее</a>