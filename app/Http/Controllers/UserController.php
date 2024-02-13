<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function index()
    {
        return view('users.index', [
            'users' => User::with('type')->get()
        ]);
    }
    public function show(User $user)
    {
        return view('users.show', [
            'user' => $user
        ]);
    }

    public function edit(User $user)
    {
        return view('users.edit', [
            'user' => $user
        ]);
    }

    public function update(User $user)
    {
        $attributes = request()->validate([
            'name' => 'required',
            'email' => ['required', Rule::unique('users', 'email')->ignore($user)],
            'type_id' => ['required', Rule::exists('types', 'id')],
            'password' => 'required'
        ]);

        $attributes['password'] = bcrypt($attributes['password']);

        $user->update($attributes);
        return redirect('users');
    }

    public function create()
    {
        return view('users.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'name' => 'required',
            'email' => ['required', Rule::unique('users', 'email')],
            'type_id' => ['required', Rule::exists('types', 'id')],
            'password' => 'required|min:7'
        ]);

        $attributes['password'] = bcrypt($attributes['password']);

        User::create($attributes);
        return redirect('users');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return back();
    }
}
