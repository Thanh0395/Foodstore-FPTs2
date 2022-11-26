<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function index(){
        return view('users.userclient.register');
    }
    public function term(){
        return view('users.userclient.term');
    }

    public function store(Request $request)
    {

        $userExist = User::where('email', $request->input('email'))->first();
        // kiem tra email co trùng ko?
        if(!$userExist){
            //ko trung email
            $user = new User($request->all());
            $user->name = htmlspecialchars($request->input('name')) ;
            //ma hoa md5
            $password = $request->input('password');
            $password = md5($password);
            $confirm_password = $request->input('confirm_password');
            $confirm_password = md5($confirm_password);
            $user->password = $password;
            $user->confirm_password = $confirm_password;
            $user->save();
            return redirect()->route('user.home')->with('success','Add a new user successfully!');
        } else {
            return redirect()->route('users.userclient.register')->with('failure','Can not create a same email of an already existing user!');
        }
    }
}
