@extends('lyouts.master')

@section('content')
    <!-- cart -->
    <div class="cart-section mt-150 mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12">
                    <div class="cart-table-wrap">
                        <table class="cart-table">
                            <thead class="cart-table-head">
                                <tr class="table-head-row">
                                    <th class="product-remove"></th>
                                    <th class="product-image">Product Image</th>
                                    <th class="product-name">Name</th>
                                    <th class="product-price">Price</th>
                                    <th class="product-quantity">Quantity</th>
                                    <th class="product-total">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cartproduct as $item)
                                    <tr class="table-body-row">
                                        <td class="product-remove"><a href="/deletecart/{{ $item->id }}"><i
                                                    class="far fa-window-close"></i></a>
                                            <div>
                                                <form action="{{ route('cart.increaseQuantity', $item->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    <button type="submit"
                                                        style="width: 40%"class="btn btn-Primary">+</button>

                                                </form>

                                                <form action="{{ route('cart.decrease', $item->id) }}" method="POST">
                                                    @csrf
                                                    <button type="submit" style="width: 40%"
                                                        class="btn btn-Danger">-</button>
                                                </form>
                                            </div>
                                        </td>

                                        <td class="product-image"><img src="{{ asset($item->product->imagpath) }}"
                                                alt=""></td>
                                        <td class="product-name">{{ $item->product->name }}</td>
                                        <td class="product-price">${{ $item->product->price }}</td>
                                        <td class="product-quantity">{{ $item->quantity }}


                                        </td>
                                        <td class="product-total">${{ $item->product->price * $item->quantity }}</td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="total-section">
                        <table class="total-table">
                            <thead class="total-table-head">
                                <tr class="table-total-row">
                                    <th>Total</th>
                                    <th>Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="total-data">
                                    <td><strong>Total: </strong></td>
                                    <td>
                                        $
                                        {{ $cartproduct->sum(function ($item) {
                                            return $item->product->price * $item->quantity;
                                        }) }}
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                        <div class="cart-buttons">

                            <a href="/completeorder" class="boxed-btn black">Check Out</a>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
    <!-- end cart
@endsection
