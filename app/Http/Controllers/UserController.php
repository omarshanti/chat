<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function notify() {
        auth()->user()->unreadNotifications->markAsRead();
        return view('users.notify',[
            'notify' => auth()->user()->notifications,
        ]);
    }
}
