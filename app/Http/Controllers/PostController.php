<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
// use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{

    public function index() 
    {
        return Post::with('like')->get()->toJson();
    }

    //
    public function store(Request $request) 
    {
        $request->validate([
            'user_id' => ['required'],
            'body' => ['required', 'string'],
            'imagePath' => 'required|mimes:jpg,jpeg,png,csv,txt,xlx,xls,pdf|max:2048'
        ]);

        $filename = null;

        if($request->file('imagePath'))
        {
            $file = $request->file('imagePath');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('/images'), $filename);
        }

        $post = Post::create([
            'user_id' => $request->user_id,
            'body' => $request->body,
            'imagePath' => url('/images/'. $filename),
        ]);

        // return response()->noContent(201);
        return $post;
    }

    public function update() 
    {

    }

    public function destroy()
    {

    }
    

}
