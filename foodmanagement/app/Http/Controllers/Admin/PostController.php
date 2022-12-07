<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function index()
    {
        $posts = DB::table('posts')
            ->join('users', 'posts.U_id', '=', 'users.U_id')
            ->select('posts.*','users.name')->get();
        return view('admin.post.index',compact('posts'));
    }

    public function create()
    {
        return view('admin.post.create');
    }

    public function store(Request $request)
    {
        // kiem tra Food name co trùng ko?
        $title = htmlspecialchars($request->input('title'));
        $postExist = DB::table('posts')->where('title', $title)->first();
        if(!$postExist){
            //xu li file anh
            $imgfile = $request->file('image');
            $extension = $imgfile->getClientOriginalExtension(); //Lay duoi file
            if ( $extension != 'jpg' && $extension != 'png' && $extension != 'jpeg') {
                return redirect()->route('admin.food.index')->with('failure', 'You can only choose .jpg, .png, .jpeg file');
            }
            $image = $imgfile->getClientOriginalName();
            $imgfile->move("images/post", $image);
            $image = "images/post/".$image;
            $U_id = session()->get('U_id');
            $status =$request->input('status');
            $postcontent =$request->input('postcontent');
            // Insert du lieu vao bang foods
            DB::table('posts')-> insert(
                array('U_id'=> $U_id, 'title'=>$title,  'feature_image_path'=>$image,  'content'=>$postcontent,   'status'=>$status)
            );
            return redirect()->route('admin.post.index')->with('success','Add a new post successfully!');
        } else {
            return redirect()->route('admin.post.index')->with('failure','Can not create a same post title!');
        }

    }

    public function show($P_id){
        $post = Post::find($P_id);
        return view('admin.post.view', compact('post'));
    }
    public function showblog($P_id){
        $post = DB::table('posts')
                ->join('users', 'posts.U_id', '=', 'users.U_id')
                ->where('posts.status','Publish')
                ->where('posts.P_id',$P_id)
                ->select('posts.*','users.name')
                ->first();
        return view('users.userclient.post', compact('post'));
    }

    public function edit($P_id)
    {
        $post = Post::find($P_id);
        $status=$post->status;
        return view('admin.post.update', compact('post','status'));
    }

    public function update(Request $request, $P_id)
    {
        //Tao Insert trong DB bang foods
        $title = htmlspecialchars($request->input('title'));
        $content = $request->input('postcontent');
        $status = $request->input('status');
        $image = $request->input('imgName'); //Tao 1 input hidden de chua ten của image
        //Kiem tra co trung F_name ko?
        $postExist = DB::table('posts')->where('title', $title)
                                    ->whereNot('P_id', $P_id) ->first();
        if(!$postExist){
            $timezone = timezone_open('Asia/Ho_Chi_Minh');
            $nowDay = date_create('now',$timezone);
            $nowDay = date_format($nowDay,'Y-m-d H:i:s');
            //Xu lý neu có ảnh
            if ($request->hasFile('image')) {
                $imgfile = $request->file('image');
                $extension = $imgfile->getClientOriginalExtension(); //Lay duoi file
                if ( $extension != 'jpg' && $extension != 'png' && $extension != 'jpeg') {
                    return redirect()->route('admin.food.index')->with('failure', 'You can only choose .jpg, .png, .jpeg file');
                }
                //Neu co anh moi thi doi cot 'image' va chuyen imgfile vao thu muc ("images/post", $image)
                $image = $imgfile->getClientOriginalName();
                $imgfile->move("images/post", $image);
                $image = "images/post/".$image;
            } //Neu ko co anh thì giu nguyen cột 'image' va update
        // Update du lieu vao bang foods
            DB::table('posts') ->where('P_id',$P_id)
                    -> update(
                        array('title'=> $title , 'content'=>$content, 'feature_image_path'=>$image, 'status'=>$status, 'updated_at'=>$nowDay)
                    );
            return redirect()->route('admin.post.index')->with('success','Update a post successfully!');
        } else {
            return redirect()->route('admin.post.index')->with('failure','Can not update, post title is already exist!');
        }
    }

    public function destroy($P_id)
    {
        Post::where('P_id', $P_id)->delete();
        return redirect()->route('admin.post.index')->with('success', 'The record have been deleted');
    }

    public function changestatus(Request $request)
    {   $P_ids = $request->input('checkItem');
        if(!$P_ids)
            return redirect()->route('admin.post.index')->with('failure','Select at least an item!');
        foreach($P_ids as $P_id){
            $post = Post::find($P_id);
            $post ->status = $request->input('status');
            $post ->save();
        }
        return redirect()->route('admin.post.index')->with('success','Update an post status successfully!');
    }
}
