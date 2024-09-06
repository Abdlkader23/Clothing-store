@extends('lyouts.master')
@section('content')
    <div class="product-section mt-150 mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="section-title">
                        <h3><span class="orange-text">Our</span> Products</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, fuga quas itaque eveniet
                            beatae optio.</p>
                    </div>
                </div>
            </div>

            <div class="row">
                    @foreach ($product as $item)
                        <div class="col-lg-4 col-md-6 text-center">
                            <div class="single-product-item">
                                <div class="product-image">
                                    <a href="/singleproduct/{{$item->id}}"><img src=" {{ asset($item->imagpath) }}"
                                            style="max-height: 250px; min-height:250px"alt=""></a>
                                </div>
                                <h3>{{ $item->name }}</h3>
                                <p class="product-price"><span>{{ $item->description }}</span></p>
                                <p class="product-price"><span>price</span>{{ $item->price }}</p>
                                <p class="product-price"><span>quantity</span>{{ $item->quantity }}</p>
                                <div>
                                    <a href="/addcart/{{$item->id}}" class="cart-btn " style="width: 50%">

                                        Add to cart
                                    </a>
                                    <br><br>
                                </div>


                            </div>
                        </div>
                    @endforeach

            </div>
    </div @endsection
