<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\FuncCall;

class LoginController extends Controller
{
    public function login()
    {
        return view('adminlayout.login');
    }

    public function processLogin(Request $request)
    {
        $user = User::where('email', $request->input('email'))->first();
        if ($user == null) {
            //nguoi dung ko ton tai
            return redirect()->route('login')->with('failure', 'The user is not exist!');
        }
        // Dung password
        elseif ($user->password == md5($request->input('password'))) {
            session()->put('U_id', $user->U_id);
            session()->put('name', $user->name);
            session()->put('role', $user->role);
            session()->put('avatar', $user->avatar);
            // dd(session()->get('role'));
            return redirect()->route('admin')->with('success', 'Welcome to dashboard');
        } else {
            // Sai password
            return redirect()->route('admin.login')->with('failure', 'The password is incorrect!');
        }
    }

    public function logout()
    {
        session()->flush();
        return redirect()->route('admin.login');
    }



}
