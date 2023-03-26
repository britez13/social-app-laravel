<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{

    public function index() 
    {
        return Post::all()->toJson();
    }

    //
    public function store(Request $request) 
    {
        $request->validate([
            'user_id' => ['required'],
            'body' => ['required', 'string'],
            'imagePath' => ['string']
        ]);

        $post = Post::create([
            'user_id' => $request->user_id,
            'body' => $request->body,
            'imagePath' => $request->imagePath,
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
