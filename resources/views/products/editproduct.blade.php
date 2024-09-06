@extends('lyouts.master-admin')
@section('content-admin')
    <div class="product-section mt-150 mb-150 ">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="section-title">
                        <h3 class="orange-text"  style="color: black">Eidt Products</h3>

                    </div>
                </div>
            </div>
            <div class="contact-from-section mt-30 mb-150">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 mb-5 mb-lg-0">


        <div id="form_status"></div>
        <div class="contact-form">
            <form method="post" action="/storproduct"  id="fruitkha-contact" enctype="multipart/form-data">
                @csrf
                <p>
                    <input type="hidden" style="width: 100%"  name="id"
                    id="id" value="{{ $product->id }}">

                    <input type="text" style="width: 100%" placeholder="Name" name="name"
                        id="name" value="{{ $product->name }}">
                    <span class="text-danger">
                        @error('name')
                            {{ $message }}
                        @enderror
                    </span>
                </p>
                <p style="display: flex">
                    <input type="number" style="width: 50%" value="{{ $product->price }}" class="mr-4"
                        placeholder="Price" name="price" id="price">
                    <span class="text-danger">
                        @error('price')
                            {{ $message }}
                        @enderror
                    </span>
                    <input type="number" value="{{ $product->quantity }}" style="width: 50%"
                        placeholder="Quantity" name="quantity" id="quantity">
                    <span class="text-danger">
                        @error('quantity')
                            {{ $message }}
                        @enderror
                    </span>
                    <p>
                    <input type="file" style="width: 100%" placeholder="imagpath" name="imagpath"
                        id="imagpath" value="{{ $product->imagpath }}"   class="form-control border text-black" style="background-color: white" >
                    <span class="text-danger">
                        @error('imagpath')
                            {{ $message }}
                        @enderror
                    </span>
</p>
<p>
    <img src="{{asset($product->imagpath)}}" width="100" height="100" alt="">
</p>
                    <br>
                    <textarea name="description"  id="description" cols="30" rows="10"
                        placeholder="description" style="width: 100%">{{$product->description }}</textarea>
                    <span class="text-danger">
                        @error('description')
                            {{ $message }}
                        @enderror
                    </span>
                </p>
                <P>
                    <select name="category_id" required>
                        @foreach ($varieties as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </P>
                <p><input type="submit" value="Edit"></p>
            </form>
        </div>


                        </div>

                    </div>
                </div>
            </div>
        </div>

        @endsection
























