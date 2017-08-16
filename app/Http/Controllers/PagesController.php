<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Release;
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
        $releases = Release::orderBy('created_at', 'desc')/*->limit(3)*/->get();
        $posts = Post::orderBy('id', 'desc')/*->limit(3)*/->get();
        return view('pages.news')->withReleases($releases)->withPosts($posts);
    }
    
    public function releases() 
    {
        $releases = Release::orderBy('id', 'desc');
        
        return view('pages.releases')->withReleases($releases);
    }
    
    public function home()
    {
        return view('pages.home');
    }
}
