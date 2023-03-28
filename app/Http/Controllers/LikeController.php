<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;

class LikeController extends Controller
{
    //
    public function index(Request $request) 
    {
        
    }

    //
    public function store(Request $request) 
    {
       $request->validate([
            'user_id' => ['required'],
            'post_id' => ['required']
       ]);

    //    $alreadyLiked = Like::find()

       $like = Like::create([
        'post_id' => $request->post_id,
        'user_id' => $request->user_id
       ]);

       return $like;

    }

    public function update(Request $request) 
    {
        
    }
}
