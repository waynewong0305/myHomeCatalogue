@extends('layouts.app')

@section('content')
@php
echo $users;
@endphp
<div class="container">
    <h2>User List</h2>

    <table id="userList" class="table table-bordered">
        <thead>
            <tr>
                <th>Profile</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $id => $details)
                <tr rowId="{{ $id }}">
                    <td data-th="Profile">
                        <div class="row">
                            <div class="col-sm-3 hidden-xs"> <a href="/profile/{{ $details['id'] }}"><img src="{{ $details['image'] ?? 'https://sbcf.fr/wp-content/uploads/2018/03/sbcf-default-avatar.png' }}" class="card-img-top"/></a></div>
                            <div class="col-sm-9">
                                <h4 class="nomargin">{{ $details['name'] }}</h4>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="row">
        <div class="col-12 d-flex justify-content-center">
            {{ $users->links() }}
        </div>
    </div>

</div>
@endsection


