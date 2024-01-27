<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
// use App\Models\Project;
use App\Models\Contact;
use App\Models\Comment;
use Auth;
class AuthController extends Controller
{
    public function logout(){

        Session::flush();

         Auth::logout();

        return Redirect()->route('home');
    }

    public function check_login(){
        if (Auth::id()) {
            if (Auth::user()->user_type=='0') {
                return redirect()->route('home');
            }elseif(Auth::user()->user_type=='3'){
             return redirect()->route('dashboard');
            }elseif(Auth::user()->user_type=='2'){
                return redirect()->route('branch.dashboard');
            }
        }else{
            return redirect()->back();
        }
    }

    public function dashboard(){
        $posts = Post::count();
        $messages = Contact::count();
        $comments = Comment::count();
        return view('backend.dashboard', compact('posts', 'messages', 'comments'));
    }

    public function branch_dashboard(){
        $posts = Post::count();
        $messages = Contact::count();
        $comments = Comment::count();
        return view('branch.dashboard', compact('posts', 'messages', 'comments'));
    }
}
