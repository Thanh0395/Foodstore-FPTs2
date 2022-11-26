<?php

namespace App\Http\Controllers\User;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(){
        // $food = DB:: table('foods')
        // ->join('categories', 'foods.Cate_id', '=', 'categories.Cate_id')
        // ->where('categories.Cate_name', $F_id)
        // ->select('foods.*', 'categories.Cate_name')->get();
        // // dd($food);
        return view('users.userclient.cart');
    }
}
