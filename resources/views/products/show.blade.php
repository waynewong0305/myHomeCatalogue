@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-7">
            <div class="text-center">
                <img src="{{ $products->image }}" class="w-50">
            </div>
        </div>
        <div class="col-5">
            <div>
                <div class="d-flex align-items-center">
                    <div>
                        <h3>{{ $products->name }}</h3>
                    </div>
                </div>

                <hr>

                <h5>RM {{ $products->price }}.00</h5>

                <h5>{{ $products->description }}</h5>
            </div>

            <div class="pt-4">
            @if(Auth::user() && Auth::user()->role == 'admin')
                    <a href="/admin/product/{{ $products->id }}/edit"><button class="btn btn-primary">Edit</button></a>
            @else
                <add-to-cart-button product-id="{{ $products->id }}"></add-to-cart-button>
            @endif
            </div>
        </div>
    </div>
</div>
@endsection
