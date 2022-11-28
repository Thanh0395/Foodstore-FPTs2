<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Wishlist;
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
        ->select('foods.*', 'categories.Cate_name')->first();
        // dd($food);
        $categories = DB::table('categories')->get();

        //wishlist và rating
        $F_id = $id;
        $likeColor = 'gray';
        $U_id = session()->get('U_id');
        if (session()->get('role')) {
            $wishlist = DB::table('wishlist')
                        ->where('U_id','=',$U_id)
                        ->where('F_id','=',$F_id)
                        ->select('wishlist.like')
                        ->first();
            if (!$wishlist) $likeColor = 'gray';
            elseif ($wishlist->like == 0) $likeColor = 'gray';
            else $likeColor = 'red';
        }
        return view('users.userclient.detail', compact('food', 'categories', 'F_id','likeColor'));
    }

    //Wish list
    public function like($F_id, $likeColor){
        $response='false';
        if (session()->get('role')){
            if ($likeColor == 'gray')  $response='red';
            else $response='gray';

            $U_id = session()->get('U_id');
            if ($likeColor == 'gray')   $like = 1;
            elseif ($likeColor == 'red')  $like = 0;
            $wishlist = Wishlist::updateOrCreate(
                    ['U_id' => $U_id, 'F_id' => $F_id],
                    ['like' => $like]
            );
        } else $response='false';

        return $response;
            
    }
}
