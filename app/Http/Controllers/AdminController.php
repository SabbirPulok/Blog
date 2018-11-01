<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts=Post::orderBy('id','desc')->paginate(5);

        // return a view and pass in the above variable
        return view('admin')->withPosts($posts);
    }
    public function show($id)
    {
        $post=Post::find($id);
        return view('admin.show')->withPost($post);
    }
}
