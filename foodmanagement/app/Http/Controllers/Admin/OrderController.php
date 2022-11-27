<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index()
    {
        $orders = DB::table('orders')
                    -> join('users', 'orders.U_id', '=', 'users.U_id')
                    -> select('orders.*','users.name')
                    -> where('orders.status','<>','Cancelled')->get();
        return view('admin.order.index',compact('orders'));
    }

    public function showCancel()
    {
        $orders = DB::table('orders')
                    -> join('users', 'orders.U_id', '=', 'users.U_id')
                    -> select('orders.*','users.name')
                    -> where('orders.status','=','Cancelled')->get();
        return view('admin.order.cancel',compact('orders'));
    }
    // public function create()
    // {

    // }

    // public function store(Request $request)
    // {

    // }

    public function show($O_id){
        // Lay ra User name tu bang Orders và Users
        $VAT = 0.1;
        $User = DB::table('orders')
                        -> join('users','users.U_id','=','orders.U_id')
                        -> select('users.*','orders.status')
                        -> where('orders.O_id',$O_id)
                        -> first();
        // Lấy ra bang order_detail them thong tin ten món, so luong, ngay dat hang, trang thai hang,...
        $order_detail = DB::table('order_detail')
                        -> join('orders','orders.O_id', '=',    'order_detail.O_id')
                        -> join('foods','foods.F_id',   '=',    'order_detail.F_id')
                        -> select('order_detail.*','orders.*','foods.*')
                        -> where('order_detail.O_id',$O_id)
                        -> get();
        $count=0;
        $sum = 0;
        foreach ($order_detail as $detail){
            $sum += ($detail->quantity)*($detail->price);
        }
        return view('admin.order.view', compact('O_id','order_detail','User', 'count','sum', 'VAT'));
    }

    // Update Order status
    public function edit(Request $request)
    {   $O_ids = $request->input('checkItem');
        if(!$O_ids)
            return redirect()->route('admin.order.index')->with('failure','Select at least an item!');
        foreach($O_ids as $O_id){
            $order = Order::find($O_id);
            $order ->status = $request->input('status');
            $order ->save();
        }
        return redirect()->route('admin.order.index')->with('success','Update an order status successfully!');
    }

    // public function update(Request $request, $U_id)
    // {

    // }
    public function reasonCancel($O_id)
    {
        $User = DB::table('orders')
                        -> join('users','users.U_id','=','orders.U_id')
                        -> select('users.*')
                        -> where('orders.O_id',$O_id)
                        -> first();
        return view('admin.order.reasonCancel', compact('O_id','User'));
    }

    public function cancel(Request $request)
    {
        $O_id = $request->input('O_id');
        $order = Order::find($O_id);
        $order -> status ='Cancelled';
        $order -> note = $request->input('note');
        $order -> save();
        return redirect()->route('admin.order.index')->with('success', 'The order have been cancelled');
    }

    public function destroy($O_id)
    {
        Order::where('O_id', $O_id)->delete();
        return redirect()->route('admin.order.showCancel')->with('success', 'The order have been deleted');
    }
}
