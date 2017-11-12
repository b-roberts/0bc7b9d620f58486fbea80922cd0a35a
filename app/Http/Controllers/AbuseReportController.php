<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AbuseReportController extends Controller
{
    //
    public function store(Request $request)
    {
      $abuseReport = new \App\AbuseReport;
      $abuseReport->ip = $request->server->get('REMOTE_ADDR');
      $abuseReport->user_id = \Auth::id();
      $abuseReport->fill($request->all());
      $abuseReport->save();

      \Mail::to('barrek.roberts@gmail.com')
        ->send(new \App\Mail\AbuseReported($abuseReport));

      return back();
    }

}
