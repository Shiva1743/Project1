<?php

namespace App\Http\Controllers\StaffAndStudent;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register');
    }
    public function register(Request $request)
    {
        $this->validate($request,[
            'name'=> 'required',
            'email'=>'required|unique:users,email,$this->id,id',
            'password'=>'required',
            'confirmpassword'=>'required|same:password'
         ]);
        $signupData = new User;
        $signupData->role_id = 1;
        $signupData->name = $request->name;
        $signupData->email = $request->email;
        $signupData->password = Hash::make($request->password);
        $signupData->save();
        return redirect()->route('LoginPortal')->with('status','Register Successfully Done');
        // return redirect()->back()
    }
}
