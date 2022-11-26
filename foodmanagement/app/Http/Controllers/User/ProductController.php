<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ProductController extends Controller
{
    public function __construct()
    {

    }

    public function index(){
        $categories = DB::table('categories')->get();
        $foods = DB:: table('foods')
        ->join('categories', 'foods.Cate_id', '=', 'categories.Cate_id')
        ->select('foods.*', 'categories.Cate_name')->get();
        $Cate_name = 'all';
        return view('users.userclient.product', compact('foods', 'categories', 'Cate_name'));
    }

    public function categories($Cate_name){
        $foods = DB:: table('foods')
        ->join('categories', 'foods.Cate_id', '=', 'categories.Cate_id')
        ->where('categories.Cate_name', $Cate_name)
        ->select('foods.*', 'categories.Cate_name')->get();
        // dd($foods);
        $categories = DB::table('categories')->get();
        return view('users.userclient.product', compact('foods', 'categories', 'Cate_name'));
    }

    public function detail($id){
        $food = DB:: table('foods')
        ->join('categories', 'foods.Cate_id', '=', 'categories.Cate_id')
        ->where('foods.F_id', $id)
        ->select('foods.*', 'categories.Cate_name')->get();
        // dd($foods);
        $categories = DB::table('categories')->get();
        return view('users.userclient.detail', compact('food', 'categories', 'id'));
    }

}
