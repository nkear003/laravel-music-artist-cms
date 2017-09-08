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


      ////////////////////////////////////////
      // wm
      ////////////////////////////////////////

      $wm = File::where('category_id', 3)
          ->latest()
          ->value('path');

      $wm2 = File::where('category_id', 3)
          ->orderBy('id', 'desc')
          ->skip(1)
          ->value('path');

      $wm3 = File::where('category_id', 3)
          ->orderBy('id', 'desc')
          ->skip(2)
          ->value('path');

      ////////////////////////////////////////
      // releases
      ////////////////////////////////////////

      $release = File::where('category_id', 1)
          ->latest()
          ->value('path');

      $release2 = File::where('category_id', 1)
          ->orderBy('id', 'desc')
          ->skip(1)
          ->value('path');

      $release3 = File::where('category_id', 1)
          ->orderBy('id', 'desc')
          ->skip(2)
          ->value('path');

      ////////////////////////////////////////
      // posters
      ////////////////////////////////////////

      $poster = File::where('category_id', 4)
          ->latest()
          ->value('path');

      $poster2 = File::where('category_id', 4)
          ->orderBy('id', 'desc')
          ->skip(1)
          ->value('path');

      $poster3 = File::where('category_id', 4)
          ->orderBy('id', 'desc')
          ->skip(2)
          ->value('path');

      $weekend_mixtapes = File::where('category_id', 3)
          ->orderBy('id', 'desc');
      $allFiles = File::orderBy('created_at', 'desc')->get();

      ////////////////////////////////////////
      // return
      ////////////////////////////////////////

      return view('pages.news')

          ->withWeekend_mixtapes($weekend_mixtapes)
          ->with('allFiles', $allFiles)

          ->withWm($wm)
          ->withWm2($wm2)
          ->withWm3($wm3)
          ->withPoster($poster)
          ->withPoster2($poster2)
          ->withPoster3($poster3)
          ->withRelease($release)
          ->withRelease2($release2)
          ->withRelease3($release3);
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
