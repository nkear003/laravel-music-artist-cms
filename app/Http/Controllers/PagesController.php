<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Release;
use App\File;
use App\Category;

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

    public function admin()
    {
      return view('pages.admin');
    }

    public function news()
    {
        ////////////////////////////////////////
        // releases
        ////////////////////////////////////////

        $releases = File::where('category_id', 2)
        ->orderBy('id', 'desc')
        ->get();

        ////////////////////////////////////////
        // wm
        ////////////////////////////////////////

        $wms = File::where('category_id', 3)
        ->orderBy('category_id', 'desc')
        ->get();

        ////////////////////////////////////////
        // posters
        ////////////////////////////////////////

        $posters = File::where('category_id', 4)
        ->orderBy('id', 'desc')
        ->get();

        ////////////////////////////////////////
        // files
        ////////////////////////////////////////

        $files = File::orderBy('id', 'desc')
        ->paginate(9);

        ////////////////////////////////////////
        // return
        ////////////////////////////////////////

        return view('pages.news')
        ->withWms($wms)
        ->withReleases($releases)
        ->withPosters($posters)
        ->withFiles($files);
    }

    public function releases()
    {
        $releases = Release::where('category_id', 2)->orderBy('id', 'desc')->paginate(4);

        return view('pages.releases')->withReleases($releases);
    }

    public function wm() {

        $releases = File::where('category_id', 3)->orderBy('id', 'desc')->paginate(9);

        return view('pages.wm')->withReleases($releases);
    }

    public function posters() {

        $releases = File::where('category_id', 4)->orderBy('id', 'desc')->paginate(8);

        return view('pages.posters')->withReleases($releases);
    }

    public function home()
    {
        return view('pages.home');
    }
}
