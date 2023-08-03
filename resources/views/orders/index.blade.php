@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Order List</h2>

    <table id="orderlist" class="table table-bordered">
        <thead>
            <tr>
                <th>Order</th>
                <th>Total</th>
                <th>Status</th>
                <th>Date</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $id => $details)
                @php
                $data = json_decode($details['purchased_product'], true);
                @endphp
                <tr rowId="{{ $id }}">
                    <td data-th="Order">
                        <div class="row">
                            <div class="fw-bold">
                                <a href="/order/{{ $details['id'] }}" class="text-decoration-none">
                                    <span class="text-dark">Order ID: {{ $details['id'] }}</span>
                                </a>
                            </div> 
                            @foreach($data as $value)
                            <span>{{$value['product_name']}}, RM{{$value['product_price']}} x {{$value['product_quantity']}}</span>
                            @endforeach
                        </div>
                    </td>
                    <td data-th="Total">RM {{ $details['total'] }}</td>
                    <td data-th="Status">{{ $details['status'] }}</td>
                    <td data-th="Date">{{ $details['created_at'] }}</td>
                    <td class="actions">
                        @if($details['status'] != "Cancelled" && $details['status'] != "Cancelled by Admin" && $details['status'] != "Completed")
                        <cancel-order-button order-id="{{ $details['id'] }}"></cancel-order-button>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="row">
        <div class="col-12 d-flex justify-content-center">
            {{ $orders->links() }}
        </div>
    </div>

</div>
@endsection


