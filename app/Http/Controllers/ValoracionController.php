<?php

namespace App\Http\Controllers;

use App\Models\UserDescription;
use Illuminate\Http\Request;

class ValoracionController extends Controller
{

    protected $table = 'user_description';
    public function store(Request $request)
    {
        UserDescription::create([
            'user_id' => auth()->user()->id,
            'description_id' => $request->input('description_id'),
            'rating' => $request->input('rating'),
        ]);

        return redirect()->back();
    }
}
