<?php

namespace App\Http\Controllers\User;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginUserController extends Controller
{
    /*NGuyen Tan hung */
    public function index()
    {
        return view('users.userclient.login');
    }

    public function processLoginUser(Request $request)
    {
        $user = User::where('email', $request->input('email'))->first();
        if ($user == null) {
            return redirect()->route('user.login')->with('failure', 'The user is not exist!');
        }
        // Dung password
        elseif ($user->password == md5($request->input('password'))) {
            session()->put('U_id', $user->U_id);
            session()->put('name', $user->name);
            session()->put('role', $user->role);
            session()->put('avatar', $user->avatar);
            // dd(session()->get('role'));
            return redirect()->route('user.product.all');
        } else {
            // Sai password
            return redirect()->route('admin.login')->with('failure', 'The password is incorrect!');
        }
    }

    public function logoutUser()
    {
        session()->flush();
        return redirect()->route('user.home');
    }

    /* */
}
