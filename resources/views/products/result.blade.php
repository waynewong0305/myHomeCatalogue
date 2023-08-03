@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Search: {{ $search }}</h2>

    <table id="result" class="table table-bordered">
        <thead>
            <tr>
                <th>Result</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $id => $details)
                <tr rowId="{{ $id }}">
                    <td data-th="Image">
                        <div class="row">
                            <div class="col-sm-3 hidden-xs"> <a href="/product/{{ $details['id'] }}"><img src="{{ $details['image'] }}" class="card-img-top"/></a></div>
                            <div class="col-sm-9">
                                <h4 class="nomargin">{{ $details['name'] }}</h4>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
