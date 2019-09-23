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
            'image' => 'required|image|max:2000'
        ]);

        Post::create([
            'user_id' => \Auth::user()->id,
            'title' => $request->title,
            'content' => $request->content,
            'image' => $request->file('image')->hashName(),
        ]);

        $path = $request->file('image')->store('public');

        return redirect()->back()->with([
            'status' => $request->title . ' Create Success'
        ]);
    }

    public function show($id)
    {

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
        $item = \App\Post::find($id);
        $item->delete();
        
        return redirect()->back()->with([
            'status' =>  $item->title . ' Delete Success'
        ]);
    }
}
