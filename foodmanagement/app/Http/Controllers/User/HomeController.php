<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function __construct()
    {

    }

    public function index(){
        $fronzens = DB::table('foods')
                -> where('foods.Cate_id',2 )
                -> take(6)->get();
        $pastas = DB::table('foods')
                -> where('foods.Cate_id',3 )
                -> take(6)->get();
        $salads = DB::table('foods')
                -> where('foods.Cate_id',4 )
                -> take(6)->get();
        $drinks = DB::table('foods')
                -> where('foods.Cate_id',7 )
                -> take(6)->get();
        return view('users.userclient.home',compact('fronzens','pastas','salads','drinks'));
    }
}
