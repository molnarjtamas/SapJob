<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
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
