<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Food;


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

    //Them san pham vao gio hang
    public function addToCart($id){
        // tat sesion truoc
        // session()->forget(keys:'cart');
        session()->flush('cart');

        $foods = Food::find($id);
        $cart = session()->get(key:'cart');
        if( isset($cart[$id]) ){
            $cart[$id]['quantity'] = $cart[$id]['quantity'] + 1;
        }else{
            $cart[$id] = [
                'F_name' => $foods->F_name,
                'price' =>$foods->price,
                'quantity' => 1,
                'image' => $foods->image,
                'description' => $foods->description,
            ];
        }
        session()->put('cart', $cart);
        return response()->json([
            'code' => 200,
            'message' => 'successfully',
            'count' => 0
        ],
        status:200
    );
    }
        // echo "<pre>";
        // print_r(session()->get('cart'));

    //Sau khi co san pham se bam vao de qua trang show card de tien hanh checkout
    public function showCart(){
        $carts = session()->get('cart');
        return view('users.userclient.cart', compact('carts'));
    }
}
