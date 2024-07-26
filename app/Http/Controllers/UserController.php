<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{



    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        $ideas = $user->ideas()->paginate(5);
        // dd($ideas);
        return view('users.show', compact('user', 'ideas'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $editing = true;
        return view('users.show', compact('user', 'editing'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(User $user)
    {
        //
    }

    public function profile()
    {
        return $this->show(Auth::user());
    }
}
