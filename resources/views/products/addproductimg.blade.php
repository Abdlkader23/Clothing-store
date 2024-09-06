@extends('lyouts.master-admin')
@section('content-admin')
<form method="post" action="/storproductimag" enctype="multipart/form-data">
    <p>
        <input type="hidden" style="width: 100%" placeholder="id" name="product_id"
            id="product_id" value="{{$product->id }}">

    </p>
    @csrf
<div class="row">
    <div class="col-9">
        <div class="row">
    <div class="clo-9"><input type="file" placeholder="image" name="imag" id="imag"
    class="form-control border text-black" style="background-color: white" >
</div>

<div class="col-6">
    <p ><input class="btn btn-success" type="submit" value="Submit"></p>
</div>
</div>
</div>
</form>
    @foreach ($porductimage as $item)

    <div class="col-4 mt-5">
        <img  class="m-2"  src="{{asset($item->imag)}}" width="300" height="300" alt="">
        <a href="/removeproductimag/{{$item->id}}" class="btn btn-danger"><i class="fas fa-tresh"></i>
        Delete image
        </a>
    </div>
    @endforeach

</div>
@endsection
