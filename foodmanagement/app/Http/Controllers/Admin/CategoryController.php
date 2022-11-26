<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Food;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = DB::table('categories')->get(); //Fluent Query DB:lam vc voi DB
        return view('admin.category.index',['categories'=>$categories]);
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(Request $request)
    {
        //cách kiem tra mang nhan tu request
        //print_r($request->input('Cate_name'));
        $request->validate(['Cate_name'=>'required']);
        // Kiểm tra trùng ten thì ko tao
        $category = Category::where('Cate_name', $request->input('Cate_name'))->first(); //Eloquent Query lam vc voi Model
        if(!$category){
            //KHONG trung ten
            $category = new Category;
            $category->Cate_name = htmlspecialchars($request->input('Cate_name')) ;
            $category->save();
            return redirect()->route('admin.category.index')->with('success','Add a new category successfully!');
        } else{
            return redirect()->route('admin.category.index')->with('failure','Can not create a same Category name!');
        }
    }

    public function show($Cate_id){
        // //print_r($Cate_id);
        // $category = DB::table('categories')
        //     ->select('Cate_id')
        //     ->where('Cate_id',$Cate_id) -> first();
        $category = Category::where('Cate_id', $Cate_id)->first();
        return view('admin.category.view',compact('category'));
    }

    public function edit($Cate_id)
    {
        $category = DB::table('categories')->where('Cate_id',$Cate_id)->first();
        return view('admin.category.update', compact('category'));
    }

    public function update(Request $request, $Cate_id)
    {
        $request->validate(['Cate_name'=>'required']);
        // Kiểm tra trùng ten voi cac record khac khong
        //Tìm xem có record nào cùng tên mà khác id không. Nếu ko sẽ trả về rỗng
        $category = Category::where('Cate_name', $request->input('Cate_name'))
                            ->whereNot('Cate_id', $Cate_id) ->first();
        if(!$category){
            //KHONG trung se cho update
            $category = Category::where('Cate_id', $Cate_id)->first();
            $category->Cate_name = htmlspecialchars($request->input('Cate_name')) ;
            $category->save();
            return redirect()->route('admin.category.index')->with('success','Update category successfully!');
        } else{
            return redirect()->route('admin.category.index')->with('failure','Can not update, category name is already exist!');
        }
    }

    public function destroy($Cate_id)
    {
        $CateIsFood = Food::where('Cate_id',$Cate_id)->first();
        if ($CateIsFood) {
            return redirect()->route('admin.category.index')->with('failure', 'Can not delete the category which already have a food');
        } else {
            Category::where('Cate_id', $Cate_id)->delete();
        return redirect()->route('admin.category.index')->with('success', 'The record have been deleted');
        }
    }
}
