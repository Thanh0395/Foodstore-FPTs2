<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Food;

class DetailController extends Controller
{
    public function __construct()
    {

    }

    public function index($F_id){
        // $food = Food::find($F_id);
        $food = DB:: table('foods')
        ->join('categories', 'foods.Cate_id', '=', 'categories.Cate_id')
        ->where('categories.Cate_name', $F_id)
        ->select('foods.*', 'categories.Cate_name')->get();
        // dd($food);
        return view('users.userclient.detail', compact('food'));
    }
}
