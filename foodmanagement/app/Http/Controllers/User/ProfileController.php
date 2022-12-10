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
        $orders = DB::table('orders')
                ->where('orders.U_id', $U_id)
                ->get();
        // dd($wishlists);
        return view('users.userclient.profile',compact('count','user','orders','wishlists'));
    }

    public function removewishlist($WL_id){
        Wishlist::where('WL_id', $WL_id)->delete();
        return redirect()->route('user.profile')->with('success', 'Remove successfully');
    }

    public function edit($U_id)
    {
        $user = User::find($U_id);
        return view('users.userclient.edit', compact('user'));
    }

    public function update(Request $request, $U_id)
    {
        //Tao Insert trong DB bang foods
        $emailExist = User::where([['email','=' ,$request->input('email')], ['U_id','<>',$U_id]]) ->first();
        $image = $request->input('avtName'); //Tao 1 input hidden de chua ten của image
        //Kiem tra co trung voi email cua user khac ko?
        if(!$emailExist){
            //xử lí avatar
            if ($request->hasFile('avatar')) {
                $imgfile = $request->file('avatar');
                $extension = $imgfile->getClientOriginalExtension(); //Lay duoi file
                if ( $extension != 'jpg' && $extension != 'png' && $extension != 'jpeg') {
                    return redirect()->route('admin.food.index')->with('failure', 'You can only choose .jpg, .png, .jpeg file');
                }
                //Neu co anh moi thi doi cot 'image' va chuyen imgfile vao thu muc ("images/food", $image)
                $image = $imgfile->getClientOriginalName();
                $imgfile->move("images/user", $image);
                $image = "images/user/".$image;
            } //Neu ko co anh thì giu nguyen cột 'image' va update

            $user = User::find($U_id);
            $user->name = htmlspecialchars($request->input('name')) ;
            $user->email = $request->input('email');
            $user->phone = $request->input('phone');
            $user->address = $request->input('address');
            $user->avatar = $image;
            //Nếu ko đổi pass
            $newpassword = $request->input('newpassword');
            $confirm_password = $request->input('confirm_password');
            if($newpassword == null && $confirm_password==null){
                $user->save();
                return redirect()->route('user.profile')->with('success','Update a user successfully! No change password');
            } elseif ($newpassword == $confirm_password) {
                $password = $request->input('password');
                $password = md5($password);
                //Nếu đổi pass thì kiểm tra pass cũ
                if ($user->password == $password) {
                    $password = md5($newpassword);
                    $confirm_password = md5($confirm_password);
                    $user->password = $password;
                    $user->confirm_password = $confirm_password;
                    $user->save();
                    return redirect()->route('user.profile')->with('success','Update a user and change password successfully!');
                } else {
                    return redirect()->route('user.profile')->with('failure','Can not update, wrong password');
                }
            } else {
                return redirect()->route('user.profile')->with('failure','Can not update, wrong confirm password');
            }
        } else {
            return redirect()->route('user.profile')->with('failure','Can not update, user email is already exist!');
        }
    }
    public function userorder($O_id)
    {
        $priceReduced = 0;
        $order = Order::find($O_id);
        //Nếu cột voucher_code của orders có mã thì lưu giá trị giảm vào biến $priceReduced, ko thì $priceReduced=0
        if ($order->voucher_code != null) {
            $voucher_code = DB::table('hotdeal')->select('*')->where('voucher_code', $order->voucher_code)->first();
            $priceReduced = $voucher_code->percent;
        }
        $order_detail = DB::table('order_detail')
                        -> join('orders','orders.O_id', '=',    'order_detail.O_id')
                        -> join('foods','foods.F_id',   '=',    'order_detail.F_id')
                        -> select('order_detail.*','orders.*','foods.F_name','foods.price')
                        -> where('order_detail.O_id',$O_id)
                        -> get();
        $count=0;
        $sum = 0;
        $VAT = 10;
        foreach ($order_detail as $detail){
            $sum += ($detail->quantity)*($detail->price)*0.9;
        }
        $total = $sum * (100 - $priceReduced + $VAT)/100;
        return view('users.userclient.userorder', compact('O_id','order_detail', 'count','priceReduced','sum', 'VAT','total'));
    }
}

