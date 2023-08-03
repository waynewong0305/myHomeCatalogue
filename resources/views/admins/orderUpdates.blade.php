@extends('layouts.app')

@section('content')
@php
$data = json_decode($orders->purchased_product, true);
@endphp

<div class="container">
    <form action="/admin/orderUpdate/{{$orders->id}}" enctype="multipart/form-data" method="post">
        @csrf

        <div class="row">
            <div class="col-8 offset-2">
                <div class="row">
                    <h1>Order Updates</h1>
                </div>

                <div class="row mb-3">
                    <label for="order" class="col-md-4 col-form-label">{{ __('Order') }}</label>
                    <span>{{$orders->id}}</span>
                </div>

                <div class="row mb-3">
                    <label for="details" class="col-md-4 col-form-label">{{ __('Details') }}</label>
                    @foreach($data as $value)
                        <span>{{$value['product_name']}}, RM{{$value['product_price']}} x {{$value['product_quantity']}}</span>
                    @endforeach
                </div>

                <div class="row mb-3">
                    <label for="status" class="col-md-4 col-form-label">{{ __('Status') }}</label>

                    <select class="form-select" name="status">
                        <option value="">Select Status</option>
                        <option value="Cancelled by Admin">Cancelled</option>
                        <option value="Preparing">Preparing</option>
                        <option value="Shipping">Shipping</option>
                        <option value="Completed">Completed</option>
                    </select>

                    @error('status')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>


                <div class="row pt-4 col-2">
                    <button class="btn btn-primary">Update</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection


