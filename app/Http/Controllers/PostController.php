<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function create() {
        return view('post.create');
    }

    public function store() {
        // validate
        $data = request()->validate([
            'caption' => 'required',
            'image' => ['required', 'image'],
        ]);
        
        // save image
        $imagePath = $data['image']->store('uploads', 'public');
        
        // save post
        auth()->user()->posts()->create([
            'caption' => $data['caption'],
            'image' => $imagePath,
        ]);

        return redirect('/profile/' . auth()->user()->id);
    } 
}
