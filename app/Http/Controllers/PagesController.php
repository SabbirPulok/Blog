<?php

namespace App\Http\Controllers;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;


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
    public function postContact(Request $request)
    {
        $this->validate($request,[
           'email'=>'required|email',
            'subject'=>'min:3',
            'message'=>'min:10'
        ]);

        $data = array(
            'email' => $request->email,
            'subject' => $request->subject,
            'bodyMessage' =>$request->message
        );
        Mail::send('emails.contact',$data,function($message) use($data) {
            $message->from($data['email']);
            $message->to('sabbir.pulak@gmail.com');
            $message->subject($data['subject']);
        });
        Session::flash('success','Your Mail has sent!');
        return redirect()->back();
    }
}
