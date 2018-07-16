<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Post;
use Session;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.posts.index')->with('posts',Post::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        if($categories->count() === 0){
            Session::flash('info','You must have some categories before attempting to create apost');
            return redirect()->back();
        }
        return view('admin.posts.create')->with('categories',Category::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=>'required|max:255',
            'picture'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'content'=>'required',
            'category_id'=>'required'
        ]);

        // dd($request->all());
        $picture = $request->picture;
        $picture_new = time().$picture->getClientOriginalName();

        $picture->move('uploads/posts/',$picture_new); //moving the file ('dir',filename)

        $post = Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'featured' => 'uploads/posts/'.$picture_new, //dir+file_name
            'category_id'=> $request->category_id,
            'slug'=>str_slug($request->title)
        ]);

        Session::flash('success','Post created successfully');

        return redirect()->back();

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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
