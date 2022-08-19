<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UserPassRequest;
use Illuminate\Support\Facades\Hash;
use Storage;
use Auth;

class UserController extends Controller
{
    public function edit()
    {
        return view("mypage/profile");
    }
    
    public function passEdit()
    {
        return view("mypage/password");
    }
    
    public function profUpdate(UserRequest $request)
    {
        if (!(empty($request->image))) {
            $image = $request->image;
        // バケットの`profile`フォルダへアップロード
            $path = Storage::disk('s3')->putFile('profile', $image, 'public');
        
            Auth::user()->fill($request['user']);
            Auth::user()->image = Storage::disk('s3')->url($path);
            
            Auth::user()->save();
        } else {
            Auth::user()->fill($request['user'])->save();
        }
        
        return redirect('/');
    }
    
    public function passUpdate(UserPassRequest $request)
    {
        Auth::user()->password = Hash::make($request->password);
        Auth::user()->save();
        
        return redirect('/');
    }
}
