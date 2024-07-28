<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FollowerController extends Controller
{
    public function follow(User $user)
    {
        $user->followers()->attach(Auth::user());
        return redirect()->route('users.show', $user)->with('success', 'Followed successfully');
    }

    public function unfollow(User $user)
    {
        $user->followers()->detach(Auth::user());
        return redirect()->route('users.show', $user)->with('success', 'Unfollowed successfully');

    }
}
