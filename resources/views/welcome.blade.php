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
                @foreach ($varietie as $item)
                    <div class="col-lg-4 col-md-6 text-center">
                        <div class="single-product-item">
                            <div class="product-image">
                                <a href="/product/{{ $item->id }}"><img src="{{ url($item->imagpath) }}" alt=""
                                        style="max-height: 250px; min-height:250px"></a>
                            </div>
                            <h3>{{ $item->name }}</h3>
                            <h6>{{ $item->descption }}</h6>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="testimonail-section mt-150 mb-150">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 offset-lg-1 text-center">
                        <div class="testimonial-sliders">
                            @foreach ($reviews as $item)
                                <div class="single-testimonial-slider">
                                    <div class="client-avater">
                                        <img src="assets/img/avaters/avatar1.png" alt="">
                                    </div>
                                    <div class="client-meta">
                                        <h3>{{ $item->name }}<span>{{ $item->phone }}</span></h3>
                                        <p class="testimonial-body">
                                            {{ $item->messge }}
                                        <div class="last-icon">
                                            <i class="fas fa-quote-right"></i>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
