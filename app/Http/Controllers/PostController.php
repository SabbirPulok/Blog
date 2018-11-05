<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;
use App\Tag;
use Illuminate\Http\Request;
use Session;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        //create a variable and store all the blog posts in it from the database
        $posts=Post::orderBy('id','desc')->paginate(5);

        // return a view and pass in the above variable
        return view('posts.index')->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::all();
        $tags=Tag::all();
        return view('posts.create')->withCategories($categories)->withTags($tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // dd($request);
        //validate
        $this->validate($request,array(
            'title'=>'required|max:200',
            'slug'=>'required|alpha_dash|min:5|max:255|unique:posts,slug',
            'category_id'=>'required|integer',
            'body'=>'required'
        ));
        //store into database
        $post = new Post;
        $post->title = $request->title;
        $post->slug =$request->slug;
        $post->category_id = $request->category_id;
        $post->body = $request->body;

        $post->save();
        if(isset($request->tags))
        {
            $post->tags()->sync($request->tags,false);
        }
         else
         {
             $post->tags()->sync(array());
         }
        Session::flash('success','Your post has been successfully submitted.');

        //redirect to another page
        return redirect()->route('posts.show',$post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post=Post::find($id);
        return view('posts.show')->withPost($post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //find the post in the database and save it as a variable
        $post=Post::find($id);

        $categories= Category::all();
        $cats = array();
        foreach($categories as $category)
            {
                $cats[$category->id]=$category->name;
            }
        //find the tags
        $tags=Tag::all();
        $tag2=array();
        foreach($tags as $tag)
        {
            $tag2[$tag->id]=$tag->name;
        }
        //return the view and pass in the var as we previously created
        return view('posts.edit')->withPost($post)->withCategories($cats)->withTags($tag2);
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
        $post=Post::find($id);
        if($request->input('slug')==$post->slug)
        {
            $this->validate($request,array(
                'title'=>'required|max:200',
                'category_id'=>'required|integer',
                'body'=>'required'
            ));
        }
        else {
            //Validate the data
            $this->validate($request, array(
                'title' => 'required|max:200',
                'slug' => 'required|alpha_dash|min:5|max:255|unique:posts,slug',
                'category_id'=>'required|integer',
                'body' => 'required'
            ));
        }
        //save data to the database
            $post=Post::find($id);

            $post->title = $request->input('title');
            $post->slug = $request->input('slug');
            $post->category_id= $request->input('category_id');
            $post->body = $request->input('body');

            $post->save();
        if(isset($request->tags))
        {
            $post->tags()->sync($request->tags);
        }
        else
        {
            $post->tags()->sync(array());
        }

        //set flash data with success message
        Session::flash('success',"Successfully Updated the post.");
        //redirect with flash data to posts.show
        return redirect()->route('posts.show',$post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post =Post::find($id);
        $post->tags()->detach();
        $post->delete();
        Session::flash('success',"Your post has been deleted successfully.");
        return redirect()->route('posts.index');
    }
}
