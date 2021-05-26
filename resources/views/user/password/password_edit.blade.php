@extends('layouts.master-user')
@section('content')

    <div style="margin-top: 8rem;margin-right: 5rem" class="container">
    <form method="post" action="{{route('profile.password.store')}}">
        @csrf
        <input name="except" type="hidden">
        <div style="margin-bottom: 2rem" class="row">
            <div class="col">
                <input name="current_password" id="current_password" type="password" class="form-control" placeholder="Your Current Password">
                @error('current_password')
                <div><span class="text-danger">{{$message}}</span></div>
                @enderror
            </div>
            <div class="col">
                <input name="password" id="password" type="password" class="form-control" placeholder="Your New Password">
                @error('password')
                <div><span class="text-danger">{{$message}}</span></div>
                @enderror
            </div>

            <div class="col">
                <input name="password_confirmation" id="password_confirmation" type="password" class="form-control" placeholder="Confirm Your New Password">
                @error('password_confirmation')
                <div><span class="text-danger">{{$message}}</span></div>
                @enderror
            </div>
        </div>

        <div class="row">
            <div class="col">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </div>

    </form>

</div>
