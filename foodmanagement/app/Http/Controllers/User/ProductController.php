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
    public static function like($F_id, $likeColor){
        if (session()->get('role')) {
            $U_id = session()->get('U_id');
            $wishlistExist = DB::table('wishlist')->where('F_id', $F_id)->where('U_id',$U_id)->first();
            $like=0;
            if ($likeColor == 'gray')   $like = 0;
            elseif ($likeColor == 'red')  $like = 1;
            if(!$wishlistExist){
                DB::table('wishlist')-> insert(
                    array('U_id'=>$U_id, 'F_id'=>$F_id,  'like'=>1)
                );
                // return redirect()->route('admin.food.view',$F_id);
            } else {
                $WL_id = $wishlistExist->WL_id;
                DB::table('wishlist') ->where('WL_id',$WL_id)
                        -> update(
                            array('like'=>!$like)
                        );
                // return redirect()->route('admin.food.view',$F_id);
            }
            return $likeColor;
        } else return redirect()->route('user.login')->with('failure', 'Login before add this food to wishlist');
    }
}
