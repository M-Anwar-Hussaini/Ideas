<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class IdeaController extends Controller
{
    public function store(Request $request) {
        $idea = new Idea($request->all());
        if($idea->save()) {
            return redirect()->route('home')->with('success', 'Idea was created successfully');
        }

    }
}
