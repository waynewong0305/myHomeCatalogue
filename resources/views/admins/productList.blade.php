@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex align-items-baseline pb-3">
        <h2 class="pe-3">Product List</h2>
        <a href="/admin/newProduct"><button class="btn btn-primary">New Product</button></a>
    </div>

    <table id="productList" class="table table-bordered">
        <thead>
            <tr>
                <th>Product</th>
                <th>Description</th>
                <th>Price</th>
                <th>Disabled</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $id => $details)
                <tr rowId="{{ $id }}">
                    <td data-th="Product">
                        <div class="row">
                            <div class="col-sm-3 hidden-xs"> <a href="/product/{{ $details['id'] }}"><img src="{{ $details['image'] }}" class="card-img-top"/></a></div>
                            <div class="col-sm-9">
                                <h4 class="nomargin">{{ $details['name'] }}</h4>
                            </div>
                        </div>
                    </td>
                    <td data-th="Description">{{ $details['description'] }}</td>
                    <td data-th="Price">RM {{ $details['price'] }}</td>
                    <td data-th="Disabled">{{ $details['deleted'] == 1? 'Yes':'No' }}</td>
                    <td class="actions">
                        <a href="/admin/product/{{ $details['id'] }}/edit"><button class="btn btn-primary">Edit</button></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
        
    </table>
    <div class="row">
        <div class="col-12 d-flex justify-content-center">
            {{ $products->links() }}
        </div>
    </div>

</div>
@endsection


