@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="text-center">
            <img src="{{ asset('welcome.png') }}" class="w-50">
            <h5>**Please click on the image to view the details and place order**</h5>
        </div>
    </div>

    <div class="d-flex">
        @foreach($products as $product)
            <div class="col-3 pb-4">
                <a href="/product/{{ $product->id }}">
                    <img src="{{ $product->image }}"  class="w-100">
                </a>
            </div>
        @endforeach
    </div>

    <div class="row">
        <div class="col-12 d-flex justify-content-center">
            {{ $products->links() }}
        </div>
    </div>

</div>
@endsection