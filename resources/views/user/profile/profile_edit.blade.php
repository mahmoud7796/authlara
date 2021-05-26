@extends('layouts.master-user')
@section('content')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js"></script>


    <div style="margin-top: 3rem" class="container">
    <form method="post" action="{{route('profile.update')}}" enctype="multipart/form-data">
        @csrf
        <input name="except" value="{{$user -> profile_photo_path}}" type="hidden">
        <div style="margin-bottom: 2rem" class="row">
            <div class="col">
                <input name="name" value="{{$user -> name}}" type="text" class="form-control" placeholder="User Name">
                @error('name')
                <div><span class="text-danger">{{$message}}</span></div>
                @enderror
            </div>
            <div class="col">
                <input name="email" value="{{$user -> email}}" type="email" class="form-control" placeholder="Your E-mail">
                @error('email')
                <div><span class="text-danger">{{$message}}</span></div>
                @enderror
            </div>
        </div>
        <div style="margin-bottom: 2rem" class="row">
            <input name="profile_image" value="{{$user -> profile_image}}" type="file" class="form-control" id="image" />
            @error('profile_image')
            <div><span class="text-danger">{{$message}}</span></div>
            @enderror
        </div>
        <div style="margin-bottom: 2rem" class="row">
            <img id="showImage" style="width: 100px;height: 100px" class="card-img-top" src="{{!empty($user -> profile_photo_path) ? url($user -> profile_photo_path):url('upload/not_found.png')}}" alt="Card image cap">
        </div>

        <div class="row">
            <div class="col">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </div>

    </form>

</div>

    <script type="text/javascript">
       $(document).ready(function (){
          $('#image').change(function(e){
             var reader = new FileReader();
             reader.onload = function(e){
                 $('#showImage').attr('src',e.target.result);
             }
             reader.readAsDataURL(e.target.files['0']);
          });
       });
    </script>

    @stop
