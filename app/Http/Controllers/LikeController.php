<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function like(Idea $idea)
    {
        $idea->likes()->attach(Auth::user());
        return back()->with('success', 'Liked successfully');
    }
    public function unlike(Idea $idea)
    {
        $idea->likes()->detach(Auth::user());
        return back()->with('success', 'Unliked successfully');
    }
}
