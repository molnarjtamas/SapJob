<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function index()
    {
        return view('home', [
            'posts' => Post::all()
        ]);
    }
    public function store()
    {
        $attributes = request()->validate([
            'job_title' => 'required',
            'location'=> 'required',
            'email'=>'required',
            'description' => 'required'
        ]);
        Post::create([
            'user_id' => auth()->id(),
            'job_title' => $attributes['job_title'],
            'location' => $attributes['location'],
            'email' => $attributes['email'],
            'description' => $attributes['description']
        ]);

        return redirect('/home');
    }
}
