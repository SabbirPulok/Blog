<?php

namespace App\Http\Controllers;
use App\Post;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function getIndex()
    {
        $posts=Post::orderBy('created_at','desc')->limit(4)->get();
        return view('pages/welcome')->withPosts($posts);
    }
    public function getAbout()
    {
        $first="Sabbir";
        $last="Pulok";
        $full=$first." ".$last;
        $email="sabbir.pulak@gmail.com";
        $data=[];
        $data['fullname']=$full;
        $data['email']=$email;

        return view('pages/about')->withData($data);
    }
    public function getContact()
    {
        return view('pages/cont');
    }
}
