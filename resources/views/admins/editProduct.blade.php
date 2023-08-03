@extends('layouts.app')

@section('content')
<div class="container">
    <form action="/admin/product/{{ $products->id }}" enctype="multipart/form-data" method="post">
        @csrf
        @method('PATCH')

        <div class="row">
            <div class="col-8 offset-2">
                <div class="row">
                    <h1>Edit Product</h1>
                </div>

                <div class="row mb-3">
                    <label for="name" class="col-md-4 col-form-label">{{ __('Name') }}</label>

                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') ?? $products->name }}" required autocomplete="name" autofocus>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="row mb-3">
                    <label for="description" class="col-md-4 col-form-label">{{ __('Description') }}</label>

                    <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') ?? $products->description }}" required autocomplete="description" autofocus>

                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="row mb-3">
                    <label for="price" class="col-md-4 col-form-label">{{ __('Price') }}</label>

                    <input id="price" type="text" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price') ?? $products->price }}" required autocomplete="price" autofocus>

                    @error('price')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="row mb-3">
                    <label for="check" class="col-md-4 col-form-label">{{ __('Disable') }}</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="deleted" id="radios1" value="1" {{ $products->deleted == 1 ? 'checked' : '' }}>
                        <label class="form-check-label" for="radios1">
                            Yes
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="deleted" id="radios2" value="0" {{ $products->deleted == 1 ? '' : 'checked' }}>
                        <label class="form-check-label" for="radios2">
                            No
                        </label>
                    </div>
                </div>

                <div class="row">
                    <label for="image" class="col-md-4 col-form-label">{{ __('Product Image') }}</label>

                    <input type="file" class="form-control-file" id="image" name="image">

                    @error('image')
                            <strong>{{ $message }}</strong>
                    @enderror
                </div>

                <div class="row pt-4 col-2">
                    <button class="btn btn-primary">Save Product</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
