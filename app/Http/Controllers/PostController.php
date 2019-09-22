<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
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
        return view('show')->with([
            'items' => Post::where('user_id', $id)->orderBy('id', 'desc')->paginate(),
            'author' => Post::find($id)
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
