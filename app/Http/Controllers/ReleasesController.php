<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Release;
use Session;
use Storage;
use Image;
use App\File;
use App\Utility;

class ReleasesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // create a variable and store all blog releases in it from db

        $releases = Release::orderBy('id', 'desc')->paginate(10);

        // return a view and pass in the variable

        return view('releases.index')->withReleases($releases);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('releases.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // php validate the data
        $this->validate($request, array(
            'title' => 'required|max:255|unique:releases,title'
        ));

        // process files function & get returned img, mp3, wav ids
        $global_vars = File::process($request);

        // process release
        $release = Release::process($request, $global_vars);

        // success message
        Session::flash('success', 'The form was successfully posted.');

        // ...& redirect
        return redirect()->route('releases.show', $release->slug);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $release = Release::where('slug', $slug)->first();
        return view('releases.show')->withRelease($release);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        // find the release in the database and save as a var

        $release = Release::where('slug', $slug)->first();

        // return the view and pass in the var just created

        return view('releases.edit')->withRelease($release);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // validate the form

        $this->validate($request, array(
            'title' => 'required|max:255'
        ));

        // save the data to the database

        $release = Release::find($id);

        if (!empty($request->image)) {

            $image = $request->image;
            $image->origName = $image->getClientOriginalName();
            $image->title = $image->origName;

            $release->image = $image->title;

            Storage::disk('public')->putFileAs('images', $image, $image->title);

        }

        if (!empty($request->wav)) {

            $wav = $request->wav;
            $wav->origName = $wav->getClientOriginalName();
            $wav->title = $wav->origName;

            $release->wav = $wav->title;

            Storage::disk('public')->putFileAs('zips', $wav, $wav->title);

        }

        if (!empty($request->mp3)) {

            $mp3 = $request->mp3;
            $mp3->origName = $mp3->getClientOriginalName();
            $mp3->title = $mp3->origName;

            $release->mp3 = $mp3->title;

            Storage::disk('public')->putFileAs('zips', $mp3, $mp3->title);

        }


        $release->title = $request->input('title');
        $release->slug = str_slug($release->title, '-');
        $release->body = $request->input('body');
        $release->released = $request->input('released');
        $release->mastered_by = $request->input('mastered_by');
        $release->genre = $request->input('genre');
        $release->soundcloud_id = $request->input('soundcloud_id');

        $release->save();

        // set flash data with success message

        Session::flash('success', 'The release was successfully updated');

        // redirect with flash data with success message

        return redirect()->route('releases.show', $release->slug);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $release = Release::find($id);

        // delete it
        $release->delete();

        // Success flash method
        Session::flash('success', 'The release was successfully deleted');

        // redirect
        return redirect()->route('releases.index');
    }
    public function release($slug)
    {

        $release = Release::where('slug', $slug)->first();
        return view('blog.release')->withSlug($slug);
    }
}
