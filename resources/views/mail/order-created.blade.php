<p>Уважаемый {{ $name }}</p>

<p>Спасибо что выбрали наш магазин</p>

<p>Ваш заказ :</p>
<table style="width:100%">
    <thead>
        <tr style="width:100%">
            <th>Название</th>
            <th>Кол-во</th>
            <th>Цена</th>
        </tr>
    </thead>
    <hr>
    <tbody>
    @foreach($order->products()->with('category')->get() as $product)
        <tr style="width:100%">
            <td>{{$product->name}}</td>
            <td style="text-align:center;">{{ $product->pivot->count }}</td>
            <td>{{$product->price}} ₽</td>
        </tr>
        <hr>
    @endforeach
        <tr style="width:100%">
            <td colspan="2">Общая стоимость:</td>
            <td>{{$fullSum}} ₽</td>
        </tr>
    </tbody>
</table>