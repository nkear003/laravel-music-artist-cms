<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

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
    
    public function news() {
        $posts = Post::orderBy('id', 'desc')/*->limit(3)*/->get();
        return view('pages.news')->withPosts($posts)->withPosts($posts);
    }
    
    public function releases() 
    {
//        $posts = Post::orderBy('created_at', 'desc');
        $posts = Post::all();
        
        return view('pages.releases')->withPosts($posts);
    }
    
    public function home()
    {
        return view('pages.home');
    }
}
