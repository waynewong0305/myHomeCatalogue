@extends('layouts.app')

@section('content')
@php
$data = json_decode($orders->purchased_product, true);
@endphp

<div class="container">
    <div>
        <h3>Order Details:</h3>
        <div class="row">
            <h5>Order ID: {{ $orders->id }}</h5>
            <h5>Name: {{ $orders->user->name }}</h5>
            <h5>Phone: {{ $orders->user->profile->phone }}</h5>
            <h5>Address: {{ $orders->user->profile->address }}</h5>
            <h5>Total: RM {{ $orders->total }}</h5>
            <h5>Date: {{ $orders->created_at }}</h5>
            <div class="d-flex align-items-baseline pb-3">
                <h5 class="pe-3">Status: {{ $orders->status }}</h5>
                @can('update', $orders->user->profile)
                    @if($orders->status != "Cancelled" && $orders->status != "Cancelled by Admin" && $orders->status != "Completed")
                        <cancel-order-button order-id="{{ $orders->id }}"></cancel-order-button>
                    @endif
                @endcan
            </div>
        </div>
    </div>

    <table id="order" class="table table-bordered">
        <thead>
            <tr>
                <th>Product</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Sub-Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $id => $details)
                <tr rowId="{{ $id }}">
                    <td data-th="Product">
                        <div class="row">
                            <div class="col-sm-3 hidden-xs"> <a href="/product/{{ $details['product_id'] }}"><img src="{{ $details['product_image'] }}" class="card-img-top"/></a></div>
                            <div class="col-sm-9">
                                <h4 class="nomargin">{{ $details['product_name'] }}</h4>
                            </div>
                        </div>
                    </td>
                    <td data-th="Price">RM {{ $details['product_price'] }}</td>
                    <td data-th="Quantity">{{ $details['product_quantity'] }}</td>
                    <td data-th="Subtotal">RM {{ $details['product_price'] * $details['product_quantity'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection


