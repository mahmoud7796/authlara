<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\PasswordRequest;
use App\Http\Requests\ProfileRequest;
use App\Models\User;
use App\Traits\General;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{
    use General;


    public function logout(){
        Auth::logout();
        return redirect()-> route('login');
    }

    public function profile(){
        $id = Auth::id();
        $user = User::find($id);
        return view('user.profile.profile_view',compact('user'));
    }

    public function edit(){
        $id = Auth::id();
        $user = User::find($id);
        return view('user.profile.profile_edit',compact('user'));
    }
    public function update(ProfileRequest $request){
       // return  $request -> profile_image;
      // return $request;
        $id = Auth::id();
        $user = User::find($id);

        $user -> name =$request -> name;
        $user -> email = $request -> email;
         $img = $user -> profile_photo_path;
        if($request -> has('profile_image')){
            $imageName = $this -> saveImage($request -> profile_image, 'upload/users_images/');
            $user -> profile_photo_path = $imageName;
            if($img !== null){
            $deleteOldImage = $this -> DeleteImage($img,'users_images','upload/users_images');
            }
        }
        $user -> save();
        $notification = array(
            'message' => 'تم الحفظ بنجاح',
            'alert-type' => 'success',
        );
        return redirect()-> route('user.profile')-> with($notification);

    }

    public function passIndex(){
        return view('user.password.password_edit');
    }
    public function passStore(PasswordRequest $request){
        $user = Auth::user();
         $dbPassword = $user->password;
        if(Hash::check($request ->current_password,$dbPassword)){
            $user = User::find(Auth::id());
            $user -> password = Hash::make($request -> password);
            $user -> save();
            Auth::logout();

            $notification = array(
                'message' => 'تم تغيير الباسورد بنجاح',
                'alert-type' => 'success',
            );
            return redirect()-> route('login')-> with($notification);

        }else {
            $notification = array(
                'message' => 'الباسورد الحالى خطأ',
                'alert-type' => 'error',
            );
            return redirect()-> route('profile.password.view')-> with($notification);

        }

    }



}
