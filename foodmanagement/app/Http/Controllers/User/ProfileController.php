<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function profile()
    {
        $count = 1;
        $U_id = session()->get('U_id');
        $user = User::find($U_id);
        $wishlists = DB:: table('wishlist')
                ->join('foods', 'wishlist.F_id', '=', 'foods.F_id')
                ->join('categories', 'foods.Cate_id', '=', 'categories.Cate_id')
                ->where('wishlist.U_id', $U_id)
                ->where('wishlist.like', 1)
                ->select('foods.*','categories.*','wishlist.WL_id')->get();
        // dd($wishlists);
        return view('users.userclient.profile',compact('count','user','wishlists'));
    }

    public function removewishlist($WL_id){
        Wishlist::where('WL_id', $WL_id)->delete();
        return redirect()->route('user.profile')->with('success', 'Remove successfully');
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
            return redirect()->route('admin.user.index')->with('success','Add a new user successfully!');
        } else {
            return redirect()->route('admin.user.index')->with('failure','Can not create a same email of an already existing user!');
        }
    }

    public function show($U_id){
        $user = User::find($U_id);
        return view('admin.user.view', compact('user'));
    }

    public function edit($U_id)
    {
        $user = User::find($U_id);
        return view('admin.user.update', compact('user'));
    }

    public function update(Request $request, $U_id)
    {
        //Tao Insert trong DB bang foods
        $userExist = User::where([['email','=' ,$request->input('email')], ['U_id','<>',$U_id]]) ->first();
        //Kiem tra co trung voi email cua user khac ko?
        if(!$userExist){
            $user = User::find($U_id);
            $user->name = htmlspecialchars($request->input('name')) ;
            $user->role = $request->input('role');
            $user->email = $request->input('email');
            $user->phone = $request->input('phone');
            $user->address = $request->input('address');
            //Lay 2 bien password ra
            $password = $request->input('password');
            $confirm_password = $request->input('confirm_password');
            if($password==null && $confirm_password==null){
                $user->save();
                return redirect()->route('admin.user.index')->with('success','Update a user successfully! No change password');
            } elseif ($password == $confirm_password) {
                $password = md5($password);
                $confirm_password = md5($confirm_password);
                $user->password = $password;
                $user->confirm_password = $confirm_password;
                $user->save();
                return redirect()->route('admin.user.index')->with('success','Update a user and change password successfully!');
            } else {
                return redirect()->route('admin.user.index')->with('failure','Can not update, wrong confirm password');
            }
        } else {
            return redirect()->route('admin.user.index')->with('failure','Can not update, user email is already exist!');
        }
    }

    public function destroy($U_id)
    {
        $UserIsOrder = Order::where('U_id',$U_id)->first();
        if ($UserIsOrder) {
            return redirect()->route('admin.user.index')->with('failure', 'Can not delete the user who already have an order / cancelled order');
        } else {
            User::where('U_id', $U_id)->delete();
            return redirect()->route('admin.user.index')->with('success', 'The user have been deleted');
        }
    }
}
