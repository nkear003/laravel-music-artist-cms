<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\File;

class PagesController extends Controller
{
    public function index()
    {
      return view('pages.home');
    }

    public function about()
    {
      return view('pages.about');
    }

    public function contact()
    {
      //
    }

    public function admin() {
      return view('pages.admin');
    }


    public function news() {

      ////////////////////////////////////////
      // wm
      ////////////////////////////////////////

      $wms = File::where('category_id', 3)
        ->orderBy('category_id', 'desc')
        ->get();

      ////////////////////////////////////////
      // releases
      ////////////////////////////////////////

      $releases = File::where('category_id', 1)
        ->orderBy('id', 'desc')
        ->get();

      ////////////////////////////////////////
      // posters
      ////////////////////////////////////////

      $posters = File::where('category_id', 4)
        ->orderBy('id', 'desc')
        ->get();

      ////////////////////////////////////////
      // return
      ////////////////////////////////////////

      $files = File::orderBy('id', 'desc')
        ->paginate(9);

      ////////////////////////////////////////
      // return
      ////////////////////////////////////////

      return view('pages.news')
        ->withWms($wms)
        ->withPosters($posters)
        ->withReleases($releases)
        ->withFiles($files);
    }

    public function releases()
    {
        $posts = Post::where('category_id', 1)->orderBy('id', 'desc')->paginate(4);

        return view('pages.releases')->withPosts($posts);
    }

    public function wm() {

        $posts = File::where('category_id', 3)->orderBy('id', 'desc')->paginate(9);

        return view('pages.wm')->withPosts($posts);
    }

    public function posters() {

        $posts = File::where('category_id', 4)->orderBy('id', 'desc')->paginate(8);

        return view('pages.posters')->withPosts($posts);
    }

    public function home()
    {
        return view('pages.home');
    }
}
