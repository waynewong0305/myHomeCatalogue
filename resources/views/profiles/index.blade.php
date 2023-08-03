@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 p-5">
            <img src="{{ $user->profile->profileImage() }}" class="rounded-circle w-100">
        </div>
        <div class="col-9 pt-5">
            <div class="row d-flex pb-4">
                <div class="col-3 pt-5 pb-2">
                    <h3>Nickname: </h3>
                    <h4>{{ $user->profile->nickname }}</h4>
                </div>

                <div class="col-3 pt-5 pb-2">
                    <h3>Phone: </h3>
                    <h4>{{ $user->profile->phone }}</h4>
                </div>
    
                <div class="col-3 pt-5 pb-4">
                    <h3>Email: </h3>
                    <h4>{{ $user->email }}</h4>
                </div>
            </div>
            
            <div class="row d-flex pb-4">
                <div class="col-3 pt-5 pt-4">
                    <h3>Address: </h3>
                    <h4>{{ $user->profile->address }}</h4>
                </div>
            </div>

            <div class="pt-5">
                <hr>
            </div>
            
            <div class="pb-5">
                @can('update', $user->profile)
                    <a href="/profile/{{ $user->id }}/edit"><button class="btn btn-primary">Edit Profile</button></a>
                @endcan
            </div>
        </div>



    </div>
</div>
@endsection
