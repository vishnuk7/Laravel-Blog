<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Category;
use App\Tag;
use App\Post;
use Session;
use File;
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
        if($categories->count() === 0 || $tags->count() === 0){
            Session::flash('info','You must have some categories and tags before attempting to create apost');
            return redirect()->back();
        }
        return view('admin.posts.create')->with('categories',Category::all())
                                         ->with('tags',Tag::all());
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
            'category_id'=>'required',
            'tags'=>'required'
        ]);


        // dd($request->all());
        $picture = $request->picture;
        $picture_new = time().$picture->getClientOriginalName();
        $picture->move('uploads/posts',$picture_new); //moving the file ('dir',filename)
        $post = Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'featured' => 'uploads/posts/'.$picture_new, //dir+file_name
            'category_id'=> $request->category_id,
            'slug'=>str_slug($request->title)
        ]);

        $post->tags()->attach($request->tags);
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
        $post = Post::find($id);
        return view('admin.posts.edit')->with('post',$post)->with('categories',Category::all());
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
        $this->validate($request,[
            'title'=>'required|max:255',
            'content'=>'required',
            'category_id'=>'required'
        ]);

        $post = Post::find($id);

        if($request->hasfile('picture')){
            $picture = $request->picture;
            $picture_new = time().$picture->getClientOriginalName();
            $picture->move('uploads/posts',$picture_new);

            $post->featured ='uploads/posts/'.$picture_new;
        }

        $post->title = $request->title;
        $post->content = $request->content;
        $post->category_id = $request->category_id;

        $post->save();
        Session::flash('success','Post Update Successfully ');

        return redirect()->route('post');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();

        Session::flash('success','The post just trashed');

        return redirect()->back();
    }

    public function trashed(){
        $post = Post::onlyTrashed()->get();

        return view('admin.posts.trashed')->with('posts',$post);
    }

    public function kill($id){
        $post = Post::withTrashed()->where('id',$id)->first();
        $image_path = $post->featured;
        // dd('{{ $image_path }}');
        if(file_exists(public_path($image_path )))
            unlink(public_path($image_path));

        $post->forceDelete();


        Session::flash('success','Post deleted permanently');
        return redirect()->back();

    }

    public function restore($id){
        $post = Post::withTrashed()->where('id',$id)->first();
        $post->restore();

        Session::flash('success','Post Restored Successfully ');

        return redirect()->route('post');
    }
}
