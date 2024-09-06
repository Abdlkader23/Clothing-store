@extends('lyouts.master')

@section('content')
<!-- products -->
<div class="product-section mt-150 mb-150">
    <div class="container">

        <div class="row">
            <div class="col-md-12">
                <div class="product-filters">
                    <ul>
                        <li class="active" data-filter="*">All</li>
      @foreach ($varieties as $item)
            <li data-filter="._{{$item->id}}">{{$item->name}}</li>
      @endforeach
                    </ul>
                </div>
            </div>
        </div> <div class="row product-lists">
   @foreach ($product as $item)

            <div class="col-lg-4 col-md-6 text-center _{{$item->category_id}}">
                <div class="single-product-item">
                    <div class="product-image">
                        <a href=""><img
                             src="{{asset($item->imagpath)}}"

                                 style="max-height: 250px; min-height:250px"alt=""></a>
                    </div>
                    <h3>{{$item->name}}</h3>
                    <p class="product-price"><span>price</span> {{$item->price}} </p>
                    <p class="product-price"><span>{{$item->description}}</span>  </p>
                    <a href="/addcart/{{$item->id}}" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
                </div> </div>
   @endforeach

</div>




        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="pagination-wrap">
                    <ul>
                        <li><a href="#">Prev</a></li>
                        <li><a href="#">1</a></li>
                        <li><a class="active" href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">Next</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end products -->



@endsection
