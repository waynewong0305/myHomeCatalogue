@extends('layouts.app')

@section('content')
<div class="container">
    <table id="cart" class="table table-bordered">
        <thead>
            <tr>
                <th>Product</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Sub-Total</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @php $total = 0 @endphp
            @if(session('cart'))
                @foreach(session('cart') as $id => $details)
                    <tr rowId="{{ $id }}">
                        <td data-th="Product">
                            <div class="row">
                                <div class="col-sm-3 hidden-xs"> <a href="/product/{{ $id }}"><img src="{{ $details['image'] }}" class="card-img-top"/></a></div>
                                <div class="col-sm-9">
                                    <h4 class="nomargin">{{ $details['name'] }}</h4>
                                </div>
                            </div>
                        </td>
                        <td data-th="Price">RM {{ $details['price'] }}</td>
                        <td data-th="Quantity">{{ $details['quantity'] }}</td>
                        <td data-th="Subtotal">RM {{ $details['subtotal'] }}</td>
                        <td class="actions">
                            <remove-from-cart-button product-id="{{ $id }}"></remove-from-cart-button>
                        </td>
                    </tr>

                    @php $total+= $details['quantity'] * $details['price'] @endphp
                @endforeach
            @endif
        </tbody>
        <tfoot>
            <tr>
                <td colspan="5">
                    <strong>Total: RM {{ $total }}</strong>
                </td>
            </tr>
        </tfoot>
    </table>
    <!-- <a href="{{ url('/home') }}" class="btn btn-primary"><i class="fa fa-angle-left mr-1"></i> Continue Shopping</a> -->
    @if(session('cart'))
    <checkout-button user-id="{{ $users }}"></checkout-button>
    @endif

</div>
@endsection


