<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\Phone;
use App\Category;
use App\Tag;

class PostController extends Controller
{

    public function index(){
    	$posts = Post::getPostPanigate(env('PAGES'));
        // foreach ($posts as  $value) {
        //     dd($value->category);
        // }
    	return view('blog.index',compact('posts'));
    }
    public function search(Request $request){
        $search= Post::search($request->search);
        return view('blog.search',compact('search'));
    }
    public function detail(Request $request){
        $random = Post::all()->random(2);
    	$post = Post::detail($request->content);
    	return view('blog.post-rightSidebar',compact('post','random'));
    }
    public function category(Request $request){
        $arr = Category::category($request->slug);
        return view('blog.category',compact('arr'));
    }
    public function tag($slug){
        $tag = Tag::where('slug',$slug)->first();
        $category=Category::all();
        return view('blog.tag',compact('tag','category'));
    }
    public function about(){
        return view('blog.about');
    }
    public function contact(){
        return view('blog.contact');
    }
    public function home(){
        return view('blog.home');
    }

}
