<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Rating;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Food;

use function GuzzleHttp\Promise\all;
use function PHPUnit\Framework\isNull;

class ProductController extends Controller
{
    public function __construct()
    {

    }

    public function index(){
        $categories = DB::table('categories')->get();
        $foods = DB:: table('foods')
        ->join('categories', 'foods.Cate_id', '=', 'categories.Cate_id')
        ->select('foods.*', 'categories.Cate_name')
        -> paginate(20);
        $Cate_name = 'all';
        return view('users.userclient.product', compact('foods', 'categories', 'Cate_name'));
    }

    public function categories($Cate_name){
        $foods = DB:: table('foods')
        ->join('categories', 'foods.Cate_id', '=', 'categories.Cate_id')
        ->where('categories.Cate_name', $Cate_name)
        ->select('foods.*', 'categories.Cate_name')-> paginate(20);
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
        $login = 'false';
        if($U_id) $login = 'true';
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
        $rating = DB::table('foods')
                        -> selectRaw('foods.F_name, AVG(rating) AS rating, count(R_id) AS reviews')
                        -> leftJoin('rating','foods.F_id', '=', 'rating.F_id')
                        -> groupBy('foods.F_name')
                        -> where('foods.F_id','=',$F_id)
                        -> first();
        $comments = DB::table('foods')
                    -> select('rating.comment', 'users.name','rating.updated_at')
                    -> join('rating','foods.F_id','=','rating.F_id')
                    -> join('users','rating.U_id','=','users.U_id')
                    -> where('foods.F_id','=', $F_id)
                    -> paginate(10);
        $haveCmt = 'yes';
        if ($comments[0]==null) $haveCmt='no';
        return view('users.userclient.detail', compact('food', 'categories', 'F_id','likeColor','rating','U_id','login','comments','haveCmt'));
    }

    //Wish list
    public function like($F_id, $likeColor){
        $response='false';
        if (session()->get('role') != ''){
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

    //Rating
    public function rating($F_id, $rating, $comment){
            $U_id = session()->get('U_id');
            $ratingTable = Rating::updateOrCreate(
                ['U_id' => $U_id, 'F_id' => $F_id],
                ['rating' => $rating, 'comment' => $comment]
            );
            $ratingTable->save();
            $rated = strval($rating);
            return $rated;
    }

    //Them san pham vao gio hang
    public function addToCart($id){
        // tat sesion truoc
        // session()->forget(keys:'cart');
        // session()->flush('cart');
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
                'description' => $foods->description
            ];
        }
        session()->put('cart', $cart);
        return response()->json([
            'code' => 200,
            'message' => 'success',
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
        return view('users.userclient.list-cart', compact('carts'));
    }

    public function checkOut(){
        $carts = session()->get('cart');
        return view('users.userclient.checkOut', compact('carts'));
    }

    public function updateCart(Request $request) {
        // print_r($request->all());
        if($request->id && $request->quantity){
            $carts = session()->get('cart');
            $carts[$request->id]['quantity'] = $request->quantity;
            session()->put('cart', $carts);
            $carts = session()->get('cart');
            $cart_component = view('users.userclient.list-cart', compact('carts'))->render();
            return response()->json(['cart_component' => $cart_component, 'code' => 200 ], status:200);
            // return redirect()->route('users.userclient.list-cart')->with('carts');
            // return view('users.userclient.list-cart', compact('carts'));
        }
        // $carts = session()->get('cart');
        // return view('users.userclient.checkOut', compact('carts'));
    }
}
