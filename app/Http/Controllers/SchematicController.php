<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\Yaml\Yaml;
use Auth;
class SchematicController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth')->except(['index','show']);
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $schematics = \App\Schematic::with('author')->get();

        return view('pages.schematics.index',['schematics'=>$schematics]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = \App\Category::get();
        return view('pages.schematics.create',['categories'=>$categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $yaml = Yaml::parse(file_get_contents($request->file('schematic')));
        //
        $schematic = new \App\Schematic;
        $schematic->fill($request->all());
        $schematic->user_id = Auth::id();
        $schematic->filedata = Yaml::dump($yaml);
        $schematic->save();

        $primaryImage = $request->file('image')->store('schematics');
        $image = new \App\Image;
        $image->schematic_id = $schematic->id;
        $image->user_id = Auth::id();
        $image->filename = $primaryImage;
        $image->save();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $schematic = \App\Schematic::find($id);

        $view = new \App\View;
        if (Auth::check())
        {
          $view->user_id =  Auth::id();
        }
        $view->schematic_id=$id;
        $view->save();

        $temperature = collect($schematic->yaml['cells'])->average('temperature');


        $suggestions = \App\Schematic::with('author')->take(10)->get();
        return view('pages.schematics.show',[
          'schematic'=>$schematic,
          'suggestions'=>$suggestions,
          'temperature'=>$temperature]);
    }

    public function download($id)
    {
      //
      $schematic = \App\Schematic::find($id);

      $download = new \App\Download;
      if (Auth::check())
      {
        $download->user_id =  Auth::id();
      }
      $download->schematic_id=$id;
      $download->save();

      // create a stream, and send the file
      return \Response::stream(function () use ($schematic) {
          // grab the raw file and echo it out
          echo $schematic->filedata;
      }, 200, [
          // other headers could be added
          'Cache-Control' => 'must-revalidate, post-check=0, pre-check=0',
          'Content-Description' => 'File Download of '.$schematic->title,
          'Content-Disposition' => 'attachment; filename=' .$schematic->title . '.yml',
          'Expires' => '0',
          'Pragma' => 'public'
      ]);
    }
    public function like($id)
    {
        //
        $schematic = \App\Schematic::find($id);

        $like = new \App\Like;
        if (Auth::check())
        {
          $like->user_id =  Auth::id();
        }
        $like->schematic_id=$id;
        $like->save();

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
