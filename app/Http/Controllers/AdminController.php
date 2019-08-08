<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function dataUser()
    {

        return view('admin.user.data-user')->with([
            'items' => User::all()
        ]);
    }
}
