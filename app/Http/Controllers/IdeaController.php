<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class IdeaController extends Controller
{
    public function edit(Idea $idea)
    {
        return view('ideas.edit', [
            'idea' => $idea
        ]);
    }

    public function update(Idea $idea)
    {
        $attributes = request()->validate([
            'name' => 'required',
            'description_id' => ['required', Rule::exists('languages', 'id')],
            'language_id' => ['required', Rule::exists('languages', 'id')]
        ]);

        $idea->update($attributes);
        return redirect('terms');
    }

    public function create()
    {
        return view('ideas.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'name' => 'required',
            'description_id' => ['required', Rule::exists('languages', 'id')],
            'language_id' => ['required', Rule::exists('languages', 'id')]
        ]);

        Idea::create($attributes);
        return redirect('terms');
    }

    public function destroy(Idea $idea)
    {
        $idea->delete();
        return back();
    }
}
