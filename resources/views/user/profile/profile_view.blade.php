@extends('layouts.master-user')
@section('content')


    <div class="card .p-8"  style="width: 18rem;">
        <img class="card-img-top" src="{{!empty($user -> profile_photo_path) ? url($user -> profile_photo_path) : url('upload/not_found.png')}}" alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title">{{$user -> name}}</h5>
            <p class="card-text">{{$user -> email}}</p>
        </div>
        <a class="btn btn-primary" href="{{route('profile.edit')}}">Edit</a>
    </div>

    @stop
