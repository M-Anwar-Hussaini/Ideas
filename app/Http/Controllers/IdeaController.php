<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IdeaController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'content' => ['required', 'min:3', 'max:240']
        ]);
        $validated['user_id'] = Auth::id();
        Idea::create($validated);
        return redirect()->route('home')->with('success', 'Idea was created successfully');


    }

    public function destroy(Idea $idea)
    {
        if (Auth::id() !== $idea->user_id) {
            abort(404);
        }
        $idea->delete();

        return redirect()->route('home')->with('success', 'The idea successfully deleted');
    }

    public function show(Idea $idea)
    {
        return view('ideas.show', compact('idea'));
    }

    public function edit(Idea $idea)
    {
        if (Auth::id() !== $idea->user_id) {
            abort(404);
        }
        $editing = true;
        return view('ideas.show', compact('idea', 'editing'));
    }

    public function update(Request $request, Idea $idea)
    {
        if (Auth::id() !== $idea->user_id) {
            abort(404);
        }
        $validated = $request->validate([
            'content' => ['required', 'min:3', 'max:240']
        ]);
        $idea->update($validated);
        return redirect()->route('ideas.show', $idea)->with('success', 'Idea successfully updated');

    }
}
