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
        return view('pages.posts');
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
