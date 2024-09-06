@extends('lyouts.master-admin')

@section('content-admin')
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3 text-center">
                <h1 style="color: black">
                    Product
                </h1>
            </div>
        </div>
    </div>

    <a href="/addProduct" class="btn btn-success" ><i class="fas fa-pen"></i> Add product</a><br><br>
    <table class="table  table-bordered">
        <tr>
            <td>ID</td>
            <td>name</td>
            <td>Description</td>
            <td>imagpath</td>
            <td>price</td>
            <td>quantity</td>
            <td>Edit</td>
            <td>Delete</td>
            <td>Add Image</td>

        </tr>

        @foreach ($product as $item)
            <tr>
                <td> {{ $item->id }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->description }}</td>
                <td>{{ $item->imagpath }}</td>
                <td>{{ $item->price }}</td>
                <td>{{ $item->quantity }}</td>
                <td>
                    <a href="/deletproduct/{{ $item->id }}" class="btn btn-danger"><i class="fas fa-trash"></i>
                        Delete</a>
                </td>
                <td> <a href="/editproduct/{{ $item->id }}" class="btn btn-primary"><i class="fas fa-pen"></i>
                        Edit</a>
                </td>
                <td> <a href="/addproductimg/{{ $item->id }}" class="btn btn-dark"><i class="fas fa-image"></i>
                    Add Image</a>
                </td>

            </tr>
        @endforeach


    </table>
@endsection
