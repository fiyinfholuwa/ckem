<?php

namespace App\Http\Controllers;

use App\Models\Audio;
use App\Models\ChurchMember;
use App\Models\ChurchRequest;
use App\Models\Comment;
use App\Models\Contact;
use App\Models\Pastor;
use App\Models\User;
use App\Models\Post;
use App\Models\PostCategory;
use App\Models\SpecialEvent;
use App\Models\Testimonial;
use Illuminate\Support\Facades\Session;
use Auth;
class AuthController extends Controller
{
    public function logout(){

        Session::flush();

         Auth::logout();

        return Redirect()->route('login');
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
        $members =ChurchMember::count();
        $workers =ChurchMember::where('worker_status', '=', 'yes')->count();
        $ordained =ChurchMember::where('ordained_status', '=', 'yes')->count();
        $requests= ChurchRequest::count();
        $testimonials = Testimonial::count();
        $post_category = PostCategory::count();
        $posts = Post::count();
        $pastors = Pastor::count();
        $audios = Audio::count();
        $branches = User::where('user_type', '=', 2)->count();
        $events = SpecialEvent::count();
        $messages = Contact::count();
        $comments= Comment::count();
        return view('backend.dashboard', compact('members', 'workers', 'ordained', 'requests','testimonials', 'post_category', 'posts', 'pastors', 'audios', 'branches', 'events', 'messages', 'comments'));
    }

    public function branch_dashboard(){
        $members =ChurchMember::where('branch_id', '=', Auth::user()->id)->count();
        $workers =ChurchMember::where('branch_id', '=', Auth::user()->id)->where('worker_status', '=', 'yes')->count();
        $ordained =ChurchMember::where('branch_id', '=', Auth::user()->id)->where('ordained_status', '=', 'yes')->count();
        $requests= ChurchRequest::where('user_id', Auth::user()->id)->count();
        $testimonials = Testimonial::where('user_id', '=', Auth::user()->id)->count();
        return view('branch.dashboard', compact('members', 'workers', 'ordained', 'requests','testimonials'));
    }
}
