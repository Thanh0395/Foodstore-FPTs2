<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Rating;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use App\Models\Food;

use function GuzzleHttp\Promise\all;
use function PHPUnit\Framework\isNull;

class ProductController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        $priceMin = 0;
        $priceMax = 10000000;
        $categories = DB::table('categories')->get();
        $foods = DB::table('foods')
            ->join('categories', 'foods.Cate_id', '=', 'categories.Cate_id')
            ->join('calories', 'foods.F_name', '=', 'calories.F_name')
            ->select('foods.*', 'categories.Cate_name','calories.calories')
            ->paginate(20);
        $Cate_name = 'all';

        $count_cart = session()->get('count_cart');
        session()->put('count_cart');
        return view('users.userclient.product', compact('foods', 'categories', 'Cate_name', 'count_cart'));

        return view('users.userclient.product', compact('foods', 'categories', 'Cate_name','priceMin','priceMax'));

    }

    public function categories(Request $request,$Cate_name)
    {
        $priceMin = 0;
        $priceMax = 10000000;
        if (isset($request)){
            $priceMin = intval($request->input('priceMin'));
            $priceMax = intval($request->input('priceMax'));
            if ($priceMax==0) $priceMax = 10000000;
        }
        if ($Cate_name == 'all') {
            $foods = DB::table('foods')
                ->join('categories', 'foods.Cate_id', '=', 'categories.Cate_id')
                ->join('calories', 'foods.F_name', '=', 'calories.F_name')
                ->select('foods.*', 'categories.Cate_name','calories.calories')
                ->where('foods.price','>',$priceMin)
                ->where('foods.price','<',$priceMax)
                ->paginate(20);
            $Cate_name = 'all';
        } else {
            $foods = DB::table('foods')
                ->join('categories', 'foods.Cate_id', '=', 'categories.Cate_id')
                ->join('calories', 'foods.F_name', '=', 'calories.F_name')
                ->where('categories.Cate_name', $Cate_name)
                ->where('foods.price','>',$priceMin)
                ->where('foods.price','<',$priceMax)
                ->select('foods.*', 'categories.Cate_name','calories.calories')
                ->paginate(20);
            // dd($foods);
        }
        $categories = DB::table('categories')->get();
        return view('users.userclient.product', compact('foods', 'categories', 'Cate_name','priceMin','priceMax'));
    }

    public function detail($id)
    {
        $food = DB::table('foods')
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
        if ($U_id) $login = 'true';
        if (session()->get('role')) {
            $wishlist = DB::table('wishlist')
                ->where('U_id', '=', $U_id)
                ->where('F_id', '=', $F_id)
                ->select('wishlist.like')
                ->first();
            if (!$wishlist) $likeColor = 'gray';
            elseif ($wishlist->like == 0) $likeColor = 'gray';
            else $likeColor = 'red';
        }
        $rating = DB::table('foods')
            ->selectRaw('foods.F_name, AVG(rating) AS rating, count(R_id) AS reviews')
            ->leftJoin('rating', 'foods.F_id', '=', 'rating.F_id')
            ->groupBy('foods.F_name')
            ->where('foods.F_id', '=', $F_id)
            ->first();
        $comments = DB::table('foods')
            ->select('rating.comment', 'users.name', 'rating.updated_at')
            ->join('rating', 'foods.F_id', '=', 'rating.F_id')
            ->join('users', 'rating.U_id', '=', 'users.U_id')
            ->where('foods.F_id', '=', $F_id)
            ->paginate(10);
        $sauces = DB::table('sauce')->orderByDesc('Sauce_id')->get();
        $haveCmt = 'yes';
        if ($comments[0] == null) $haveCmt = 'no';
        return view('users.userclient.detail', compact('food', 'categories', 'F_id', 'likeColor', 'rating', 'U_id', 'login', 'comments', 'haveCmt', 'sauces'));
    }

    //Wish list
    public function like($F_id, $likeColor)
    {
        $response = 'false';
        if (session()->get('role') != '') {
            if ($likeColor == 'gray')  $response = 'red';
            else $response = 'gray';

            $U_id = session()->get('U_id');
            if ($likeColor == 'gray')   $like = 1;
            elseif ($likeColor == 'red')  $like = 0;
            $wishlist = Wishlist::updateOrCreate(
                ['U_id' => $U_id, 'F_id' => $F_id],
                ['like' => $like]
            );
        } else $response = 'false';
        return $response;
    }

    //Rating
    public function rating($F_id, $rating, $comment)
    {
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
    public function addToCart($id)
    {
        // tat sesion truoc
        // session()->forget(keys:'cart');
        // session()->flush('cart');
        $foods = Food::find($id);

        $cart = session()->get(key:'cart');
        if( isset($cart[$id]) ){
            $cart[$id]['quantity'] = $cart[$id]['quantity'] + 1;
        }else{

        $cart = session()->get(key: 'cart');
        if (isset($cart[$id])) {
            $cart[$id]['quantity'] = $cart[$id]['quantity'] + 1;
        } else {
            $cart[$id] = [
                'F_name' => $foods->F_name,
                'price' => $foods->price,
                'quantity' => 1,
                'image' => $foods->image,
                'description' => $foods->description,
                'Sauces' => 'Demi'
            ];
        }
        // dd(session()->get('count_cart'));
        session()->put('cart', $cart);


        return response()->json([
            'code' => 200,
            'message' => 'success',
            'count' => 0
        ],
        status:200
    );

        return response()->json(
            [
                'code' => 200,
                'message' => 'success',
                'count' => 0
            ],
            status: 200
        );

    }
}
    // echo "<pre>";
    // print_r(session()->get('cart'));

    //Sau khi co san pham se bam vao de qua trang show card de tien hanh checkout
    public function showCart()
    {
        $carts = session()->get('cart');
        $percent = 0;
        return view('users.userclient.list-cart', compact('carts', 'percent'));
    }


    public function checkOut($total)
    {
        $carts = session()->get('cart');
        $totalCheckout = $total;
        return view('users.userclient.checkOut', compact('carts','totalCheckout'));
    }

    public function updateCart(Request $request)
    {
        // dd($request->all());
        if ($request->id && $request->quantity) {
            $carts = session()->get('cart');
            $carts[$request->id]['quantity'] = $request->quantity;
            $carts[$request->id]['Sauces'] = $request->Sauce;
            session()->put('cart', $carts);

            $carts = session()->get('cart');
            $percent = 0;

            $cart_component = view('users.userclient.list-cart', compact('carts', 'percent'))->render();
            return response()->json(['cart_component' => $cart_component, 'code' => 200 ], status:200);

            $cart_component = view('users.userclient.list-cart', compact('carts', 'percent'))->render();
            return response()->json(['cart_component' => $cart_component, 'code' => 200], status: 200);
            // return redirect()->route('users.userclient.list-cart')->with('carts');
            // return view('users.userclient.list-cart', compact('carts'));
        }
    }

    public function hotdeal(Request $request)
    {
        $hotdeals = DB::table('hotdeal')->get();
        $hotdeals_json = json_decode($hotdeals, true);

        if ($request->Voucher) {
            foreach ($hotdeals_json as $key => $value) {
                if($value['voucher_code'] == $request->Voucher){
                    $percent = $value['percent'];
                    $percent_exist = 0;
                }
            }
        }
        $cart_component = view('users.userclient.list-cart', compact('carts', 'percent', 'count_cart'))->render();
        return response()->json(['cart_component' => $cart_component, 'code' => 200 ], status:200);
    }

    public function deleteCart(Request $request){
        if($request->id){
            $carts = session()->get('cart');

            unset($carts[$request->id]);
            session()->put('cart', $carts);
            $carts = session()->get('cart');
            $percent = 0;

            $cart_component = view('users.userclient.list-cart', compact('carts', 'percent'))->render();
            return response()->json(['cart_component' => $cart_component, 'code' => 200 ], status:200);

        }
    }

    public function vnpayPayment()
    {
        error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = 'https://google.com';//"http://127.0.0.1:8000/admin/order/thankyou/".$_POST['O_id'];
        $vnp_TmnCode = "PB9RYKRD"; //Mã website tại VNPAY
        $vnp_HashSecret = "LDKGFMFXNDLQMZSPKRPCEAIDZAMFCGNG"; //Chuỗi bí mật

        $vnp_TxnRef = time().'a';//time().$_POST['O_id']; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
        $vnp_OrderInfo = 'a';//$_POST['name'];
        $vnp_OrderType = 'billpayment';
        $vnp_Amount = 10000*100;//$_POST['total'] * 100;
        $vnp_Locale = 'en';
        $vnp_BankCode = '';
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];

        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,

        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
            $inputData['vnp_Bill_State'] = $vnp_Bill_State;
        }

        //var_dump($inputData);
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret); //
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }
        $returnData = array(
            'code' => '00', 'message' => 'success', 'data' => $vnp_Url
        );
        if (isset($_POST['redirect'])) {
            header('Location: ' . $vnp_Url);
            die();
        } else {
            echo json_encode($returnData);
        }
        // vui lòng tham khảo thêm tại code demo
    }
}
