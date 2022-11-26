<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WishlistController extends Controller
{
    public function index()
    {
        $U_id= session()->get('U_id');
        $foods = DB::table('foods')
            ->join('wishlist', 'foods.F_id', '=', 'wishlist.F_id')
            ->join('categories', 'foods.Cate_id', '=', 'categories.Cate_id')
            ->select('foods.*','categories.Cate_name','wishlist.WL_id')
            ->where('wishlist.U_id',$U_id)
            ->where('wishlist.like',1)
            ->get();
        return view('admin.wishlist.index',compact('foods'));
    }

    public function add($F_id, $like, $U_id)
    {
        $wishlistExist = DB::table('wishlist')->where('F_id', $F_id)->where('U_id',$U_id)->first();
        if(!$wishlistExist){
            DB::table('wishlist')-> insert(
                array('U_id'=>$U_id, 'F_id'=>$F_id,  'like'=>1)
            );
            return redirect()->route('admin.food.view',$F_id);
        } else {
            $WL_id = $wishlistExist->WL_id;
            DB::table('wishlist') ->where('WL_id',$WL_id)
                    -> update(
                        array('like'=>!$like)
                    );
            return redirect()->route('admin.food.view',$F_id);
        }
    }
    public function remove($WL_id){
        Wishlist::where('WL_id', $WL_id)->delete();
        return redirect()->route('admin.wishlist.index')->with('success', 'Remove successfully');
    }
}
