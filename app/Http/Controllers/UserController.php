<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct() {
        $this->middleware('auth')->only('store');
    }
    
    public function index()
    {
        return view('post')->with([
            'items' => Post::orderBy('id', 'desc')->paginate()
        ]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);
        Post::create($request->all());
        return redirect()->back()->with([
            'status' => 'Create Success'
        ]);
    }

    public function show($id)
    {
        $user = \App\User::where('username', $id)->first();

        return view('show')->with([
            'item' => $user,
        ]);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}