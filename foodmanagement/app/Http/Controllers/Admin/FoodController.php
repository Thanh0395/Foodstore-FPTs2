<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Food;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FoodController extends Controller
{
    public function index()
    {
        $foods = DB::table('foods')
            ->join('categories', 'foods.Cate_id', '=', 'categories.Cate_id')
            ->select('foods.*','categories.Cate_name')->get();
        return view('admin.food.index',compact('foods'));
    }

    public function create()
    {
        $categories = DB::table('categories')->get();
        // print_r($categories);
        return view('admin.food.create',compact('categories'));
    }

    public function store(Request $request)
    {
        //cách kiem tra mang nhan tu request
        //print_r('Hello day la controller food store');
        //Tao Insert trong DB bang foods
        $food = $request->all(); //tao 1 bien array la thong tin cua food vua nhap trong form
        // kiem tra Food name co trùng ko?
        $F_name = $food['F_name'];
        $foodExist = DB::table('foods')->where('F_name', $F_name)->first();
        if(!$foodExist){
            //xu li file anh
            $imgfile = $request->file('image');
            $extension = $imgfile->getClientOriginalExtension(); //Lay duoi file
            if ( $extension != 'jpg' && $extension != 'png' && $extension != 'jpeg') {
                return redirect()->route('admin.food.index')->with('failure', 'You can only choose .jpg, .png, .jpeg file');
            }
            $image = $imgfile->getClientOriginalName();
            $imgfile->move("images/food", $image);
            $image = "images/food/".$image;
            $Cate_id =$food['Cate_id'];
            $price =$food['price'];
            $description =$food['description'];
            // Insert du lieu vao bang foods
            DB::table('foods')-> insert(
                array('F_name'=> htmlspecialchars($F_name), 'Cate_id'=>$Cate_id,  'image'=>$image,  'price'=>$price,   'description'=>$description)
            );
            return redirect()->route('admin.food.index')->with('success','Add a new food successfully!');
        } else {
            return redirect()->route('admin.food.index')->with('failure','Can not create a same food name!');
        }


        //Eloquent Data, tao Doi tuong cho lop
        // Kiểm tra trùng ten thì ko tao
        // $foodExist = Food::where('F_name', $request->input('F_name'))->first(); //Eloquent Query lam vc voi Model

        // if(!$foodExist){
        //     //KHONG trung ten
        //     $food = $request->all(); //tao 1 bien array la thong tin cua food vua nhap trong form
        //     $foodNew = new Food($food); //Tao 1 doi tuong cua Obj Food (chinh la bang foods) tu tham so cua bien food vua nhap

        //     //Xu li file anh
        //     if ($request->hasFile('image')){
        //         if ( $extension != 'jpg' && $extension != 'png' && $extension != 'jpeg') {
        //             return redirect()->route('admin.food.index')->with('failure', 'You can only choose .jpg, .png, .jpeg file');
        //         }
        //         $imageName = $imgfile->getClientOriginalName();
        //         $imgfile->move("images/food", $imageName);
        //     } else {
        //         $imageName = null;
        //     }
        //     // Luu duong dan va ten file vao cot image trong DB
        //     $foodNew->image = "images/food/".$imageName;
        //     $foodNew->save();
        //     return redirect()->route('admin.food.index')->with('success','Add a new food successfully!');
        // } else{
        //     return redirect()->route('admin.food.index')->with('failure','Can not create a same food name!');
        // }
    }

    public function show($F_id){
        $food = Food::find($F_id);
        $category = Category::find($food->Cate_id);
        $U_id = session()->get('U_id');
        $wishlist = Wishlist::where('F_id','=',$F_id)->where('U_id','=',$U_id)->first();
        if ($wishlist == null) {
            $like = 0;
            return view('admin.food.view', compact('food','category','U_id','like'));
        } else {
            $like = $wishlist->like;
            return view('admin.food.view', compact('food','category','U_id','like'));
        }
    }

    public function edit($F_id)
    {
        $food = Food::find($F_id);
        $categoryOld = Category::find($food->Cate_id);
        $categories = Category::where('Cate_id','<>',$food->Cate_id)->get();
        // print_r($categories);
        return view('admin.food.update', compact('food','categoryOld','categories'));
    }

    public function update(Request $request, $F_id)
    {
        //Tao Insert trong DB bang foods
        $F_name = $request->input('F_name');
        $Cate_id = $request->input('Cate_id');
        $image = $request->input('imgName'); //Tao 1 input hidden de chua ten của image
        $price = $request->input('price');
        $description = $request->input('description');
        //Kiem tra co trung F_name ko?
        $foodExist = DB::table('foods')->where('F_name', $F_name)
                                    ->whereNot('F_id', $F_id) ->first();
        if(!$foodExist){
            //Xu lý neu có ảnh
            if ($request->hasFile('image')) {
                $imgfile = $request->file('image');
                $extension = $imgfile->getClientOriginalExtension(); //Lay duoi file
                if ( $extension != 'jpg' && $extension != 'png' && $extension != 'jpeg') {
                    return redirect()->route('admin.food.index')->with('failure', 'You can only choose .jpg, .png, .jpeg file');
                }
                //Neu co anh moi thi doi cot 'image' va chuyen imgfile vao thu muc ("images/food", $image)
                $image = $imgfile->getClientOriginalName();
                $imgfile->move("images/food", $image);
                $image = "images/food/".$image;
            } //Neu ko co anh thì giu nguyen cột 'image' va update
        // Update du lieu vao bang foods
            DB::table('foods') ->where('F_id',$F_id)
                    -> update(
                        array('F_name'=> htmlspecialchars($F_name) , 'Cate_id'=>$Cate_id, 'image'=>$image, 'price'=>$price, 'description'=>$description)
                    );
            return redirect()->route('admin.food.index')->with('success','Update a food successfully!');
        } else {
            return redirect()->route('admin.food.index')->with('failure','Can not update, food name is already exist!');
        }
    }

    public function destroy($F_id)
    {
        Food::where('F_id', $F_id)->delete();
        return redirect()->route('admin.food.index')->with('success', 'The record have been deleted');
    }
}
