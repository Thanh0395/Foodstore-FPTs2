<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AnalysisController extends Controller
{
    public function topCate(){
        $topCateQuan = DB::table('order_detail')
                        ->select('categories.Cate_name', DB::raw('SUM(quantity) AS total'))
                        ->join('foods', 'order_detail.F_id','=', 'foods.F_id')
                        ->join('orders', 'order_detail.O_id','=','orders.O_id' )
                        ->join('categories', 'foods.Cate_id','=','categories.Cate_id' )
                        ->where('orders.status','=','Finished')
                        ->groupBy('categories.Cate_name')
                        ->orderBy('categories.Cate_name','asc')
                        ->get();
        $topCateReve = DB::table('order_detail')
                        ->select('categories.Cate_name', DB::raw('SUM(quantity*price) AS amount'))
                        ->join('foods', 'order_detail.F_id','=', 'foods.F_id')
                        ->join('orders', 'order_detail.O_id','=','orders.O_id' )
                        ->join('categories', 'foods.Cate_id','=','categories.Cate_id' )
                        ->where('orders.status','=','Finished')
                        ->groupBy('categories.Cate_name')
                        ->orderBy('categories.Cate_name','asc')
                        ->get();
        return view('admin.analysis.topcategory',compact(['topCateQuan','topCateReve']));
    }
    public function topFoodIndex(){
        $top = '5';
        $period = 'All times';
        $topFoodQuan = DB::table('order_detail')
                        ->select('foods.F_name', DB::raw('SUM(quantity) AS total'))
                        ->join('foods', 'order_detail.F_id','=', 'foods.F_id')
                        ->join('orders', 'order_detail.O_id','=', 'orders.O_id')
                        ->where('orders.status','=','Finished')
                        ->groupBy('foods.F_name')
                        ->orderBy('total','desc')
                        ->get();
        $topFoodReve = DB::table('order_detail')
                        ->select('foods.F_name', DB::raw('SUM(quantity*price) AS amount'))
                        ->join('foods', 'order_detail.F_id','=', 'foods.F_id')
                        ->join('orders', 'order_detail.O_id','=', 'orders.O_id')
                        ->where('orders.status','=','Finished')
                        ->groupBy('foods.F_name')
                        ->orderBy('amount','desc')
                        ->get();
        return view('admin.analysis.topfood',compact(['top','period','topFoodQuan','topFoodReve']));
    }
    public function topFood(Request $request){
        //Lay time hien tai
        $timezone = timezone_open('Asia/Ho_Chi_Minh');
        $nowDay = date_create('now',$timezone);
        $top = $request->input('top');
        $period = $request->input('period');
        if ($period == 'All times'){
            $nowDay = 0;
        } else {
            $period = '-1 '.$period;
            $nowDay ->modify($period);
            $nowDay = date_format($nowDay,'Y-m-d H:i:s');
        }
        $period = $request->input('period');
        $topFoodQuan = DB::table('order_detail')
                        ->select('foods.F_name', DB::raw('SUM(quantity) AS total'))
                        ->join('foods', 'order_detail.F_id','=', 'foods.F_id')
                        ->join('orders', 'order_detail.O_id','=', 'orders.O_id')
                        ->where('orders.status','=','Finished')
                        ->where('orders.created_at','>=', $nowDay)
                        ->groupBy('foods.F_name')
                        ->orderBy('total','desc')
                        ->get();
        $topFoodReve = DB::table('order_detail')
                        ->select('foods.F_name', DB::raw('SUM(quantity*price) AS amount'))
                        ->join('foods', 'order_detail.F_id','=', 'foods.F_id')
                        ->join('orders', 'order_detail.O_id','=', 'orders.O_id')
                        ->where('orders.status','=','Finished')
                        ->where('orders.created_at','>=', $nowDay)
                        ->groupBy('foods.F_name')
                        ->orderBy('amount','desc')
                        ->get();
        return view('admin.analysis.topfood',compact(['top','period','topFoodQuan','topFoodReve']));
    }
    public function topUserIndex(){
        $top = '5';
        $period = 'All times';
        $topUserQuan = DB::table('order_detail')
                        ->selectRaw('users.email, SUM(quantity) AS total')
                        ->join('orders', 'order_detail.O_id','=', 'orders.O_id')
                        ->join('foods', 'order_detail.F_id','=', 'foods.F_id')
                        ->join('users', 'orders.U_id','=', 'users.U_id')
                        ->where('orders.status','=','Finished')
                        ->groupBy('users.email')
                        ->orderBy('total','desc')
                        ->get();
        $topUserReve = DB::table('order_detail')
                        ->selectRaw('users.email, SUM(quantity*price) AS amount')
                        ->join('orders', 'order_detail.O_id','=', 'orders.O_id')
                        ->join('foods', 'order_detail.F_id','=', 'foods.F_id')
                        ->join('users', 'orders.U_id','=', 'users.U_id')
                        ->where('orders.status','=','Finished')
                        ->groupBy('users.email')
                        ->orderBy('amount','desc')
                        ->get();
        return view('admin.analysis.topuser',compact(['top','period','topUserQuan','topUserReve']));
    }
    public function topUser(Request $request){
        //Lay time hien tai
        $timezone = timezone_open('Asia/Ho_Chi_Minh');
        $nowDay = date_create('now',$timezone);
        $top = $request->input('top');
        $period = $request->input('period');
        if ($period == 'All times'){
            $nowDay = 0;
        } else {
            $period = '-1 '.$period;
            $nowDay ->modify($period);
            $nowDay = date_format($nowDay,'Y-m-d H:i:s');
        }
        $period = $request->input('period');
        $topUserQuan = DB::table('order_detail')
                        ->selectRaw('users.email, SUM(quantity) AS total')
                        ->join('orders', 'order_detail.O_id','=', 'orders.O_id')
                        ->join('foods', 'order_detail.F_id','=', 'foods.F_id')
                        ->join('users', 'orders.U_id','=', 'users.U_id')
                        ->where('orders.status','=','Finished')
                        ->where('orders.created_at','>=', $nowDay)
                        ->groupBy('users.email')
                        ->orderBy('total','desc')
                        ->get();
        $topUserReve = DB::table('order_detail')
                        ->selectRaw('users.email, SUM(quantity*price) AS amount')
                        ->join('orders', 'order_detail.O_id','=', 'orders.O_id')
                        ->join('foods', 'order_detail.F_id','=', 'foods.F_id')
                        ->join('users', 'orders.U_id','=', 'users.U_id')
                        ->where('orders.status','=','Finished')
                        ->where('orders.created_at','>=', $nowDay)
                        ->groupBy('users.email')
                        ->orderBy('amount','desc')
                        ->get();
        return view('admin.analysis.topuser',compact(['top','period','topUserQuan','topUserReve']));
    }
    // public function trendCate(){
    //     return redirect()-> view('admin.analysis.topcategories');
    // }
    public function trendRevenue(){
        $timezone = timezone_open('Asia/Ho_Chi_Minh');
        $nowDay = date_create('now',$timezone);
        $LastYear= $nowDay->modify('-1 year');
        $LastYear = date_format($LastYear,'Y-m-d H:i:s');
        $trendFoodReve = DB::table('order_detail')
                        ->selectRaw('order_detail.created_at, SUM(quantity*price) AS amount')
                        ->join('foods', 'order_detail.F_id','=', 'foods.F_id')
                        ->join('orders', 'order_detail.O_id','=', 'orders.O_id')
                        ->where('orders.status','=','Finished')
                        ->where('order_detail.created_at','>=', $LastYear)
                        ->groupBy('order_detail.created_at')
                        ->orderBy('order_detail.created_at')
                        ->get();
        return view('admin.analysis.trendRevenue',compact(['trendFoodReve']));
    }

    // public function trendUser(){
    //     return redirect()-> view('admin.analysis.topcategories', compact('categories'));
    // }
}
