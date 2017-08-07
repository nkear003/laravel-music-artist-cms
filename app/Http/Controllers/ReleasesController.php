<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Release;
use Session;
use Illuminate\Support\Facades\Storage;

class ReleasesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
            'title' => 'required|max:255|unique:releases'   
        ));

        // store Release in database

        $release = new Release;

        if (!empty($request->image)) {

            $image = $request->image;
            $image->origName = $image->getClientOriginalName();    
            $image->title = $image->origName;

            $release->image = $image->title;

            Storage::disk('public')->putFileAs('images', $image, $image->title);   

        }         

        $release->title = $request->title;
        $release->slug = str_slug($release->title, '-');
        $release->description = $request->description;
        $release->released = $request->released;
        $release->mastered_by = $request->mastered_by;
        $release->genre = $request->genre;

        $release->save();


        // success message

        Session::flash('success', 'Your blog post was successfully created!');

        // redirect

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
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
