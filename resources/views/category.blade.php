@extends('layouts.main')

@section('title', $category->name)

@section('content')
<div class="container">
    <div class="starter-template">
    <h1>{{$category->name}}</h1>
    <p>{{$category->description}}</p>
    <div class="row">
        <div class="col-sm-6 col-md-4">
            <div class="thumbnail">
                <div class="labels"></div>
                    <img src="http://internet-shop.tmweb.ru/storage/products/iphone_x.jpg" alt="iPhone X 64GB">
        <div class="caption">
            <h3>iPhone X 64GB</h3>
            <p>71990 ₽</p>
            <p>
                <form action="http://internet-shop.tmweb.ru/basket/add/1" method="POST">
                    <button type="submit" class="btn btn-primary" role="button">Add to cart</button>
                    <a href="http://internet-shop.tmweb.ru/mobiles/iphone_x_64"class="btn btn-default" role="button">More about</a>
                    <input type="hidden" name="_token" value="Au89njmajixRjy3GRhAzqETFIKINQndX9YjsdiUz">            
                </form>
            </p>
        </div>
    </div>
</div>
                    <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
        <div class="labels">
            
            
                    </div>
        <img src="http://internet-shop.tmweb.ru/storage/products/iphone_x_silver.jpg" alt="iPhone X 256GB">
        <div class="caption">
            <h3>iPhone X 256GB</h3>
            <p>89990 ₽</p>
            <p>
            <form action="http://internet-shop.tmweb.ru/basket/add/2" method="POST">
                                    <button type="submit" class="btn btn-primary" role="button">Add to cart</button>
                                <a href="http://internet-shop.tmweb.ru/mobiles/iphone_x_256"
                   class="btn btn-default"
                   role="button">More about</a>
                <input type="hidden" name="_token" value="Au89njmajixRjy3GRhAzqETFIKINQndX9YjsdiUz">            </form>
            </p>
        </div>
    </div>
</div>
                    <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
        <div class="labels">
            
            
                    </div>
        <img src="http://internet-shop.tmweb.ru/storage/products/htc_one_s.png" alt="HTC One S">
        <div class="caption">
            <h3>HTC One S</h3>
            <p>12490 ₽</p>
            <p>
            <form action="http://internet-shop.tmweb.ru/basket/add/3" method="POST">
                                    <button type="submit" class="btn btn-primary" role="button">Add to cart</button>
                                <a href="http://internet-shop.tmweb.ru/mobiles/htc_one_s"
                   class="btn btn-default"
                   role="button">More about</a>
                <input type="hidden" name="_token" value="Au89njmajixRjy3GRhAzqETFIKINQndX9YjsdiUz">            </form>
            </p>
        </div>
    </div>
</div>
                    <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
        <div class="labels">
            
            
                    </div>
        <img src="http://internet-shop.tmweb.ru/storage/products/iphone_5.jpg" alt="iPhone 5SE">
        <div class="caption">
            <h3>iPhone 5SE</h3>
            <p>17221 ₽</p>
            <p>
            <form action="http://internet-shop.tmweb.ru/basket/add/4" method="POST">
                                    <button type="submit" class="btn btn-primary" role="button">Add to cart</button>
                                <a href="http://internet-shop.tmweb.ru/mobiles/iphone_5se"
                   class="btn btn-default"
                   role="button">More about</a>
                <input type="hidden" name="_token" value="Au89njmajixRjy3GRhAzqETFIKINQndX9YjsdiUz">            </form>
            </p>
        </div>
    </div>
</div>
                    <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
        <div class="labels">
            
            
                    </div>
        <img src="http://internet-shop.tmweb.ru/storage/products/samsung_j6.jpg" alt="Samsung Galaxy J6">
        <div class="caption">
            <h3>Samsung Galaxy J6</h3>
            <p>11980 ₽</p>
            <p>
            <form action="http://internet-shop.tmweb.ru/basket/add/12" method="POST">
                                    <button type="submit" class="btn btn-primary" role="button">Add to cart</button>
                                <a href="http://internet-shop.tmweb.ru/mobiles/samsung_j6"
                   class="btn btn-default"
                   role="button">More about</a>
                <input type="hidden" name="_token" value="Au89njmajixRjy3GRhAzqETFIKINQndX9YjsdiUz">            </form>
            </p>
        </div>
    </div>
</div>
            </div>
    </div>
@endsection