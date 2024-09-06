@extends('lyouts.master')
@section('content')









	<!-- breadcrumb-section -->
	<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<p>See more Details</p>
						<h1>Single Product</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->




	<!-- single product -->
	<div class="single-product mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-md-5">
					<div class="single-product-img">
						<img src="{{ asset($product->imagpath)}}" width="400" height="400" alt="">
					</div>
				</div>
				<div class="col-md-7">
					<div class="single-product-content">
						<h3>{{$product->name}}</h3>
						<p class="single-product-pricing"><span>price</span> ${{$product->price}}</p>
						<p>{{$product->description}}</p>
						<p> Catigory  :     {{$product->varieties ->name}}</p>
						<div class="single-product-form">
							<form action="index.html">
								<input type="number" placeholder="0">
							</form>
							<a href="/addcart/{{$product->id}}" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>

						</div>

					</div>

				</div>

			</div>
            <br><br>
            @if ( $product -> addProductimg->count()> 1)


            <div class="row">
                <div class="col-lg-10 offset-lg-1 text-center">
            <div class="testimonial-sliders">
            @foreach ($product -> addProductimg  as $item)
                                    <div class="single-testimonial-slider">
                                        <div class="client-avater">
                                            <img src="{{asset($item->imag)}}" style="max-width: 200px; !important"  width="250" height="200" alt="">
                                        </div>
                                        <div class="client-meta">
                                            <h3>{{$item->name}}<span>{{$item->phone}}</span></h3>
                                            <p class="testimonial-body">
                                                {{$item->messge}}

                                        </div>
                                    </div>
                                    @endforeach
                                    </div>
                                    </div>
                                    </div>
                                    @endif
		</div>
	</div>
	<!-- end single product -->

	<!-- more products -->
	<div class="more-products mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="section-title">
						<h3><span class="orange-text">Related</span> Products</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, fuga quas itaque eveniet beatae optio.</p>
					</div>

				</div>
                @foreach ($relatedProducts as $item)
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

			</div>
		</div>
	</div>
	<!-- end more products -->

	<!-- logo carousel -->
	<div class="logo-carousel-section">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="logo-carousel-inner">
						<div class="single-logo-item">
							<img src="assets/img/company-logos/1.png" alt="">
						</div>
						<div class="single-logo-item">
							<img src="assets/img/company-logos/2.png" alt="">
						</div>
						<div class="single-logo-item">
							<img src="assets/img/company-logos/3.png" alt="">
						</div>
						<div class="single-logo-item">
							<img src="assets/img/company-logos/4.png" alt="">
						</div>
						<div class="single-logo-item">
							<img src="assets/img/company-logos/5.png" alt="">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end logo carousel -->


	<!-- copyright -->
	<div class="copyright">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-12">
					<p>Copyrights &copy; 2019 - <a href="https://imransdesign.com/">Imran Hossain</a>,  All Rights Reserved.<br>
						Distributed By - <a href="https://themewagon.com/">Themewagon</a>
					</p>
				</div>
				<div class="col-lg-6 text-right col-md-12">
					<div class="social-icons">
						<ul>
							<li><a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
							<li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
							<li><a href="#" target="_blank"><i class="fab fa-instagram"></i></a></li>
							<li><a href="#" target="_blank"><i class="fab fa-linkedin"></i></a></li>
							<li><a href="#" target="_blank"><i class="fab fa-dribbble"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>


</body>
</html>
@endsection
