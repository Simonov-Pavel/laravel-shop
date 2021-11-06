@extends('layouts.main')

@section('title', 'Оформление заказа')

@section('content')
<div class="starter-template">
    <h1>Подтвердите заказ:</h1>
    <div class="container">
        <div class="row justify-content-center">
            <p>Общая стоимость: <b>{{$order->getFullPrice()}} ₽.</b></p>
            <form action="{{route('bascet-confirm')}}" method="POST">
                <div>
                    <p>Укажите свои имя и номер телефона, чтобы наш менеджер мог с вами связаться:</p>
                    <div class="container">
                        <div class="form-group">
                            <label for="name" class="control-label col-lg-offset-3 col-lg-2">Имя: </label>
                            <div class="col-lg-4">
                                <input type="text" name="name" id="name" value="{{old('name')}}" class="form-control">
                            </div>
                            @error('name')
						<div class="text-danger">{{$message}}</div>
						@enderror
                        </div>
                        <br>
                        <br>
                        <div class="form-group">
                            <label for="phone" class="control-label col-lg-offset-3 col-lg-2">Номер телефона: </label>
                            <div class="col-lg-4">
                                <input type="text" name="phone" id="phone" value="{{old('phone')}}" class="form-control">
                            </div>
                            @error('phone')
						        <div class="text-danger">{{$message}}</div>
						    @enderror
                        </div>
                    </div>
                    <br>
                    @csrf                  
                    <input type="submit" class="btn btn-success" value="Подтвердите заказ">
                </div>
            </form>
        </div>
    </div>
    </div>
@endsection