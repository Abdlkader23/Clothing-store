@extends('lyouts.master-admin')

@section('content-admin')

<div class="container my-5">
    @foreach ($order->groupBy('user_id') as $userOrders)
        <div class="row">
            <div class="col-md-8 offset-md-2 text-center">
                <h3 class="mb-4" style="color: #333;">Order Details for {{ $userOrders->first()->name }}</h3>
            </div>
        </div>

        <div class="table-responsive mb-5" style="max-height: 400px; overflow-y: auto; overflow-x: auto;">
            <table class="table table-hover table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Note</th>
                        <th>Name Product</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Product ID</th>
                        <th>Order ID</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($userOrders as $order)
                        @foreach ($orderdatail->where('order_id', $order->id) as $detail)
                            <tr>
                                <!-- عرض بيانات العميل في كل طلب -->
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->name }}</td>
                                <td>{{ $order->address }}</td>
                                <td>{{ $order->email }}</td>
                                <td>{{ $order->phone }}</td>
                                <td>{{ $order->note }}</td>

                                <!-- تفاصيل المنتج -->
                                <td>{{ $detail->name }}</td>
                                <td>{{ $detail->quantry }}</td>
                                <td>{{ $detail->price }}</td>
                                <td>{{ $detail->product_id }}</td>
                                <td>{{ $detail->order_id }}</td>

                                <!-- زر الحذف -->
                                <td>
                                    <a href="/deletorder/{{ $order->id }}" class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash"></i> Delete
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    @endforeach
                </tbody>
            </table>
        </div>
    @endforeach
</div>


@endsection

