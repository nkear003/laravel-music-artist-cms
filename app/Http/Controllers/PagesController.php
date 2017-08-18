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
    
    public function posts() {
        $post = Post::find(4);
        return view('pages.posts')->withPost($post);
    }
    
    public function news() {
        $posts = Post::orderBy('id', 'desc')/*->limit(3)*/->get();
        return view('pages.news')->withPosts($posts)->withPosts($posts);
    }
    
    public function releases() 
    {
        $releases = Post::where('category_id', 1)->limit(10)->get();
//        $releases = Post::all();
//        $releases = Post::find(1);
        
        return view('pages.releases')->withReleases($releases);
    }
    
    public function home()
    {
        return view('pages.home');
    }
}
