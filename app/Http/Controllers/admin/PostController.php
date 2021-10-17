<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::join('categories', 'categories.id', '=', 'posts.category_id')
                        ->where('posts.user_id', '1')
                        ->orderBy('posts.id', 'DESC')
                        ->get(['posts.*', 'categories.name as category_name']);
        return view('admin/posts', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['categories'] = Category::all();
        return view('admin/posts_create', ['data' => $data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->hasFile('image')){
            $imageName = time().'.'.request()->image->getClientOriginalExtension();
            request()->image->move(public_path('images'), $imageName);
            $path = 'images/'.$imageName;
        }else{
            $path = 'noimage.jpg';
        }
   
        $request->validate([
            'category_id' => 'required',
            'title' => 'required'
        ]);

        $data = [
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'category_id' => $request->category_id,
            'user_id' => $request->user_id,
            'status' => $request->status,
            'details' => $request->details,
            'tags' => json_encode($request->tags),
            'image' => $path,
            'thumb' => $path
        ];

        Post::insertGetId($data);
        return redirect('dashboard/post')->with('success_msg', 'Inserted Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['categories'] = Category::all();
        $data['post'] = Post::find($id);
        return view('admin/posts_create', ['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'category_id' => 'required',
            'title' => 'required'
        ]);

        if($request->hasFile('image')){
            $post = Post::find($id);
            $file_path = public_path().'/'.$post->image;
            
            if(file_exists($file_path)) {
                unlink($file_path);
            }

            $imageName = time().'.'.request()->image->getClientOriginalExtension();
            request()->image->move(public_path('images'), $imageName);
            $path = 'images/'.$imageName;
        }else{
            $path = 'noimage.jpg';
        }
        
        $data = [
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'category_id' => $request->category_id,
            'user_id' => $request->user_id,
            'status' => $request->status,
            'details' => $request->details,
            'tags' => $request->tags,
            'image' => $path,
            'thumb' => $path
        ];

        Post::where('id', $id)->update($data);
        return redirect('dashboard/post')->with('success_msg', 'Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::destroy($id);
        return redirect('dashboard/post')->with('success_msg', 'Deleted Successfully');
    }
}
