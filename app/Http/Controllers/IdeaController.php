<?php

namespace App\Http\Controllers;

use App\Http\Requests\Idea\IdeaCreateRequest;
use App\Http\Requests\Idea\IdeaUpdateRequest;
use App\Models\Idea;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class IdeaController extends Controller
{
    public function store(IdeaCreateRequest $request)
    {
        $validated = $request->validated();
        $validated['user_id'] = Auth::id();
        Idea::create($validated);
        return redirect()->route('home')->with('success', 'Idea was created successfully');


    }

    public function destroy(Idea $idea)
    {
        Gate::authorize('delete', $idea);
        $idea->delete();
        return redirect()->route('home')->with('success', 'The idea successfully deleted');
    }

    public function show(Idea $idea)
    {
        return view('ideas.show', compact('idea'));
    }

    public function edit(Idea $idea)
    {
        Gate::authorize('update', $idea);
        $editing = true;
        return view('ideas.show', compact('idea', 'editing'));
    }

    public function update(IdeaUpdateRequest $request, Idea $idea)
    {
        Gate::authorize('update', $idea);
        $validated = $request->validated();
        $idea->update($validated);
        return redirect()->route('ideas.show', $idea)->with('success', 'Idea successfully updated');

    }
}
