<?php

namespace App\Http\Controllers\StaffAndStudent;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Session;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }
    public function logout(Request $request)
    {
            $request->session()->flush();
            return redirect('loginportal');
    }
    public function dashboard()
    {
        $getData = session::get('SessionData');
        if(empty($getData)){
            return redirect('loginportal');
        }
        else
        {
            $userData = User::where('id',$getData['userId'])->first();
            return view('StaffMembers/Dashboard')->with(['userData'=>$userData]);
        }
    }
    public function profile(Request $request)
    {
        $getData = session::get('SessionData');
        if(empty($getData))
        {
            return redirect('loginportal');
        }
        $userData = User::where('id',$getData['userId'])->first();
        return view('profile')->with(['userData'=>$userData]);
    }
    public function profileupdate(Request $request)
    {
        $update = User::where('id',$request->userid)->first();
        $update->name = $request->name;
        $update->update();
        return back()->with('status',"Profile updated Successfully");
    }
    public function login(Request $request)
    {
        $this->validate($request,[
            'email'=>'required|email',
            'password'=>'required',
            'role'=>'required',
         ]);
        // return view('StaffMembers/Dashboard');
        
        $userData = User::where('role_id',$request->role)->where('email',$request->email)->first();
        if(empty($userData))
        {
            return redirect()->back()->with('error','you are not registered!!');
        }
        else
        {
        
            $verifyPassword = Hash::check($request->password,$userData->password);
            if(empty($verifyPassword))
            {
                return redirect()->back()->with('error','your password is Wrong!!');
            }
            else
            {
                $request->session()->put('SessionData',['userRole'=>$userData->role_id,'userId'=>$userData->id,'userName'=>$userData->name,'email'=>$userData->email]);
                    if($request->role == '0')
                    {
                        $getData = session::get('SessionData');
                            return redirect()->route('dashboard');
                    }
                    else
                    {
                        $getData = session::get('SessionData');
                            return redirect()->route('dashboard');
                    }
            }
        }
    }
}
