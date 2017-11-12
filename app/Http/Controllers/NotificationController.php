<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationController extends Controller
{
    //
    public function clear()
    {
      \Auth::user()->unreadNotifications()->update(['read_at' => \Carbon\Carbon::now()]);
    }
}
