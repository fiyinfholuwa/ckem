<?php

namespace App\Http\Controllers;
use App\Models\PostCategory;
use App\Models\Post;
use App\Models\Comment;
use Intervention\Image\Image as Image;
use Illuminate\Support\Facades\File;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function all_blog(){
        $posts  = Post::paginate(6);
        $categories = PostCategory::all();
        return view('frontend.blog', compact('posts','categories'));
    }

    public function category_view(){
        $categories = PostCategory::all();
        return view('backend.category', compact('categories'));
    }

    public function category_add(Request $request){
        $request->validate([
            'name' => 'required',
        ]);
        $url_slug = strtolower($request->name);
        $label_slug= preg_replace('/\s+/', '-', $url_slug);

        $post_category = new PostCategory;
        $post_category->name = $request->name;
        $post_category->category_url = $label_slug;
        $post_category->save();
        $notification = array(
            'message' => 'Post Category Sucessfully saved',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function category_delete($id){
        PostCategory::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Category Successfully Deleted',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function category_edit($id){
        $category = PostCategory::findOrFail($id);
        $categories = PostCategory::all();
        return view('backend.category_edit', compact('category', 'categories'));
    }



    public function category_update(Request $request, $id){
        $category_update = PostCategory::findOrFail($id);
        $url_slug = strtolower($request->name);
        $label_slug= preg_replace('/\s+/', '-', $url_slug);

        $category_update->name = $request->name;
        $category_update->category_url = $label_slug;
        $category_update->save();

        $notification = array(
            'message' => 'Category Successfully Updated',
            'alert-type' => 'success'
        );
        return redirect()->route('category.view')->with($notification);
    }

    public function post_view(){
        $categories = PostCategory::all();
        return view('backend.post_view', compact('categories'));
    }

    public function post_add(Request $request){
        $request->validate([

            'title' => 'required',
            'body' => 'required'
        ]);

    
        $url_slug = strtolower($request->title);
        $label_slug= preg_replace('/\s+/', '-', $url_slug);


        $image = $request->file('image');
        $extension = $image->getClientOriginalExtension();
        $filename = time() . '.' . $extension;
        $directory = 'uploads/blog/';
        if (!file_exists($directory)) {
            mkdir($directory, 0755, true);
        }
        $image->move($directory, $filename);
        $path = $directory . $filename;
        $new_post = new Post;
        $new_post->title = $request->title;
        $new_post->author = "Admin";
        $new_post->post_url = $label_slug;
        $new_post->category = $request->category;
        $new_post->content = $request->body;
        $new_post->image = $path;
        $new_post->save();
        $notification = array(
            'message' => 'Post Successfully added',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function post_all(){
        $posts = Post::all();
        return view('backend.post_all', compact('posts'));
    }

    public function post_delete($id){
       $post =  Post::findOrFail($id);
       $filePath = $post->image;
       File::delete(public_path($filePath));
       $post->delete();
        $notification = array(
            'message' => 'Post Successfully Deleted',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function post_edit($id){
        $categories = PostCategory::all();
        $post = Post::findOrFail($id);
        return view('backend.post_edit', compact('post', 'categories'));
    }

    public function post_update(Request $request, $id){
        $post_update = Post::findOrFail($id);

        $request->validate([
            'title' => 'required',
            'content' => 'required'
        ]);

        if($request->hasfile('image')){
            $image = $request->file('image');
            $extension = $image->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $directory = 'uploads/blog/';
            if (!file_exists($directory)) {
                mkdir($directory, 0755, true);
            }
            $image->move($directory, $filename);
            $path = $directory . $filename;
        }else{
            $path = $post_update->image;
        }
        $url_slug = strtolower($request->title);
        $label_slug= preg_replace('/\s+/', '-', $url_slug);

        $post_update->title = $request->title;
        $post_update->category = $request->category;
        $post_update->post_url = $label_slug;
        $post_update->content = $request->content;
        $post_update->image = $path;
        $post_update->save();
        $notification = array(
            'message' => 'Post Successfully updated',
            'alert-type' => 'success'
        );
        return redirect()->route('post.all')->with($notification);
    }

    public function post_detail($name){
        $categories = PostCategory::all();
        $posts  = Post::paginate(6);
        $post = Post::where('post_url', $name)->get()->first();
        $comments = Comment::where('post_id', '=', $post->id)->get();
        return view('frontend.blog_detail', compact('post', 'categories', 'posts','comments' ));
    }

    public function post_category($name){
        $category = PostCategory::where('category_url', '=', $name)->get()->first();
        $category_id = $category->id;
        $posts  = Post::where('category', '=', $category_id)->paginate(6);
        $post = Post::where('post_url', $name)->get()->first();
        $categories = PostCategory::all();
        return view('frontend.category', compact('post', 'categories', 'posts', 'category'));
    }

    public function comment_add(Request $request){
        $request->validate([
            'name' => 'required',
            'message' => 'required'
        ]);

        $comment = new Comment;
        $comment->post_id = $request->post_id;
        $comment->name = $request->name;
        $comment->message = $request->message;
        $comment->save();
        $notification = array(
            'message' => 'Comment Sucessfully posted',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function get_all_comment(){
        $comments = Comment::all();
        return view('backend.comments', compact('comments'));
    }

    public function comment_delete($id){
        Comment::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Comment Successfully Deleted',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

}
