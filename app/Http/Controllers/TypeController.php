<?php

namespace App\Http\Controllers;

use App\Models\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    public function index()
    {
        return view('types.index', [
            'types' => Type::filter(request()->only('model'))->get()
        ]);

    }
    public function show(Type $type)
    {
        return view('types.show', [
            'type' => $type
        ]);
    }

    public function edit(Type $type)
    {
        return view('types.edit', [
            'type' => $type
        ]);
    }

    public function update(Type $type)
    {
        $attributes = request()->validate([
            'name' => 'required',
            'model' => 'required'
        ]);

        $type->update($attributes);
        return redirect('types');
    }

    public function create()
    {
        return view('types.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'name' => 'required',
            'model' => 'required'
        ]);

        Type::create($attributes);
        return redirect('types');
    }

    public function destroy(Type $type)
    {
        $type->delete();
        return back();
    }
}
