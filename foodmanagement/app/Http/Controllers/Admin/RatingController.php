<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Food;
use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RatingController extends Controller
{

    public function index()
    {
        $count =0;
        $foods = DB::table('foods')
            -> selectRaw('foods.F_name, AVG(rating) AS rating, count(R_id) AS reviews')
            -> leftJoin('rating','foods.F_id', '=', 'rating.F_id')
            -> groupBy('foods.F_name')
            -> get();
        return view('admin.rating.index',compact(['foods','count']));
    }

    public function add($F_name)
    {
        $rateExist = DB::table('foods')
                -> select('foods.*', 'rating.comment')
                -> join('rating','foods.F_id','=','rating.F_id')
                -> where('foods.F_name','=', $F_name)
                -> first();
        $U_id = session()->get('U_id');
        $food = DB::table('foods')
                    -> where('F_name','=', $F_name)
                    -> first();
        if (!$rateExist) {
            $comments = "null";
        } else {
            $comments = DB::table('foods')
                    -> select('rating.comment', 'users.name','rating.updated_at')
                    -> join('rating','foods.F_id','=','rating.F_id')
                    -> join('users','rating.U_id','=','users.U_id')
                    -> where('F_name','=', $F_name)
                    -> get();
        }
        return view('admin.rating.rate', compact('food','comments','U_id'));
    }

    public function rate(Request $request)
    {
        $rating = $request->input('inputrating');
        $rating = $rating+0.0;
        $U_id = session()->get('U_id');
        $food = Food::where('F_name','=',$request->input('F_name'))->first();
        $F_id = $food->F_id;
        $rating = Rating::updateOrCreate(
            ['U_id' => $U_id, 'F_id' => $F_id],
            ['rating' => $rating, 'comment' => $request->input('comment')]
        );
        $rating->save();
        return redirect()->route('admin.rating.index')->with('success','Thank you for your comment, we will take note of it to become better');
    }
}
