<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    //    $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $mostRecent = \App\Schematic::with('author')->latest()->take(4)->get();
      $mostLiked = \App\Schematic::with('author')->withCount('likes')
        ->orderBy('likes_count', 'desc')->take(4)->get();
      $mostDownloaded =  \App\Schematic::with('author')->withCount('downloads')
        ->orderBy('downloads_count', 'desc')->take(4)->get();
      return view('welcome',[
        'mostRecent'=>$mostRecent,
        'mostLiked'=>$mostLiked,
        'mostDownloaded'=>$mostDownloaded]);
    }
}
