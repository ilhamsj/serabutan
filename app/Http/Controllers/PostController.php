<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        Post::create([
            'user_id' => \Auth::user()->id,
            'title' => $request->title,
            'content' => $request->content,
            'image' => $request->file('image')->hashName(),
            'category' => $request->category,
        ]);

        $path = $request->file('image')->store('public');

        return redirect()->back()->with([
            'status' => $request->title . ' Create Success'
        ]);
    }

    public function show($id)
    {
        return view('pages.post.show')->with([
            'item' => Post::find($id)
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
        $item = \App\Post::find($id);
        $item->delete();
        
        $file = 'public/'.$item->image;
        $cek = Storage::exists($file);
        if ($cek == true) {
            Storage::delete($file);
        }

        return redirect()->back()->with([
            'status' =>  $item->title . ' Delete Success'
        ]);
    }
}
