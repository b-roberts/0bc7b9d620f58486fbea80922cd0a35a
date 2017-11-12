<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth')->except(['index','show']);
  }
    public function show($id)
    {
      $user = \App\User::findOrFail($id);

        return view('pages.profile.show',[
          'user'=>$user,
]);
    }

}
