<p>Уважаемый {{ $name }}</p>

<p>Спасибо что выбрали наш магазин</p>

<p>Ваш заказ :</p>
<table width="100%">
        <tr>
            <td height="100%">Название</td>
            <td height="100%">Кол-во</td>
            <td height="100%">Цена</td>
        </tr>
    <hr>
    @foreach($order->products()->with('category')->get() as $product)
        <tr style="width:100%">
            <td height="100%">{{$product->name}}</td>
            <td height="100%">{{ $product->pivot->count }}</td>
            <td height="100%">{{$product->price}} ₽</td>
        </tr>
        <hr>
    @endforeach
        <tr style="width:100%">
            <td height="100%">Общая стоимость:</td>
            <td height="100%">{{$fullSum}} ₽</td>
        </tr>
</table>