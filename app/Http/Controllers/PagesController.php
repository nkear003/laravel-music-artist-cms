<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\File;

class PagesController extends Controller
{
    public function index() {
        return view('pages.home');
    }
    
    public function about() {
        return view('pages.about');
    }
    
    public function contact() {
     
        
        
    }
    
    public function files() {
        $files = File::all();
        return view('pages.files')->withFiles($files);
    }
    
    public function admin() {
        return view('pages.admin');
    }
    
    
    public function news() {
        $posts = Post::orderBy('id', 'desc')/*->limit(3)*/->get();
        return view('pages.news')->withPosts($posts)->withPosts($posts);
    }

    public function posts() {
        $posts = Post::where('category_id', 2)->orderBy('id', 'desc')->paginate(4);
        
        return view('pages.posts')->withPosts($posts);
    }
    
    public function releases() 
    {
        $posts = Post::where('category_id', 1)->orderBy('id', 'desc')->paginate(4);
        
        return view('pages.releases')->withPosts($posts);
    }
    
    public function wm() {
        
        $posts = Post::where('category_id', 3)->orderBy('id', 'desc')->paginate(8);
        
        return view('pages.wm')->withPosts($posts);
    }
    
    public function posters() {
        
        $posts = Post::where('category_id', 4)->orderBy('id', 'desc')->paginate(6);
        
        return view('pages.posters')->withPosts($posts);
    }
    
    public function home()
    {
        return view('pages.home');
    }
}
