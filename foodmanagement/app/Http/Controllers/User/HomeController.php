<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use Illuminate\Mail\Mailer;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail as FacadesMail;
// use Illuminate\Support\Facades\Mail;
use Mail;

class HomeController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        $fronzens = DB::table('foods')
            ->where('foods.Cate_id', 2)
            ->take(6)->get();
        $pastas = DB::table('foods')
            ->where('foods.Cate_id', 4)
            ->take(6)->get();
        $salads = DB::table('foods')
            ->where('foods.Cate_id', 3)
            ->take(6)->get();
        $drinks = DB::table('foods')
            ->where('foods.Cate_id', 7)
            ->take(6)->get();
        $posts = DB::table('posts')
            ->join('users', 'posts.U_id', '=', 'users.U_id')
            ->where('posts.status', 'Publish')
            ->select('posts.*', 'users.name')
            ->orderBy('posts.created_at')
            ->get();
        return view('users.userclient.home', compact('fronzens', 'pastas', 'salads', 'drinks', 'posts'));
    }

    public function contactUs(Request $request)
    {
        return view('users.userclient.contact');
    }

    public function store_contact(Request $request)
    {
        $userExist = User::where('email', $request->input('email'))->first();

        if ($userExist) {

            DB::insert('insert into contact (email, message) values (?,?)', [$request->input('email'), $request->input('message')]);
            return redirect()->route('user.home.contactUs')->with('success', 'Post your message successfully!');
        } else {
            return redirect()->route('user.home.contactUs')->with('failure', 'Email no exits !!!');
        }
    }

    public function get_voucher(Request $request, $percent, $type)
    {

        $U_id = session()->get('U_id');
        $Voucher_code = DB::table('hotdeal')->where('percent', '=', $percent)->value('voucher_code');
        $u_name = DB::table('users')->where('U_id', '=', $U_id)->value('name');
        $name = 'Group1_FoodManagement';
        FacadesMail::send('users.emails.voucher', compact('name', 'u_name', 'Voucher_code'), function ($email) use ($name) {
            $email->subject($name . ' Get Voucher');
            $email->to('tanhung.nguyen270799@gmail.com', $name);
        });
        return redirect()->route('user.home.successVOucher');
    }

    public function success_voucher()
    {
        return view('users.userclient.voucherCode');
    }

    public function voucher()
    {
        return view('users.userclient.hodeal');
    }
}
