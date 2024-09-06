@extends('lyouts.master')
@section('content')
    <div class="product-section mt-150 mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="section-title">
                        <h3><span class="orange-text">Add</span> Products</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, fuga quas itaque eveniet
                            beatae optio
                            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Distinctio, ducimus, eveniet
                            cupiditate et eum dol?.</p>
                    </div>
                </div>
            </div>
            <div class="contact-from-section mt-30 mb-150">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 mb-5 mb-lg-0">

                            <div id="form_status"></div>
                            <div class="contact-form">
                                <form method="post" action="/storereview" id="fruitkha-contact">
                                    @csrf
                                    <p>
                                        <input type="text" placeholder="Name" name="name" id="name"
                                            value="{{ old('name') }}">
                                        <span class="text-danger">
                                            @error('name')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                        <input type="text" class="ml-3" placeholder="phone" name="phone"
                                            id="phone" value="{{ old('phone') }}">
                                        <span class="text-danger">
                                            @error('phone')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </p>
                                    <p style="display: flex">
                                        <input type="email" style="width: 50%" value="{{ old('email') }}" class="mr-4"
                                            placeholder="email" name="email" id="email">
                                        <span class="text-danger">
                                            @error('email')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                        <input type="text" value="{{ old('subject') }}" style="width: 50%"
                                            placeholder="subject" name="subject" id="subject">
                                        <span class="text-danger">
                                            @error('subject')
                                                {{ $message }}
                                            @enderror
                                        </span>

                                    <p>
                                        <textarea name="messge" id="messge" cols="30" rows="10" placeholder="messge">{{ old('messge') }}</textarea>
                                        <span class="text-danger">
                                            @error('messge')
                                                {{ $messge }}
                                            @enderror
                                        </span>
                                    </p>
                                    </p>
                                    <P>

                                    </P>
                                    <p><input type="submit" value="Submit"></p>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
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
                                    <h3>{{$item->name}}<span>{{$item->phone}}</span></h3>
                                    <p class="testimonial-body">
                                        {{$item->messge}}
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
