<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Term;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Tymon\JWTAuth\Facades\JWTAuth;

class TermController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $terms = Term::with('descriptions.ideas')->get();

        return response()->json(['data' => $terms], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:terms',
            'type_id' => 'required|exists:types,id',
            'language_id' => 'required|exists:languages,id'
        ]);

        if($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $term = Term::create([
            'name' => $request->input('name'),
            'type_id' => $request->input('type_id'),
            'language_id' => $request->input('language_id'),
        ]);

        return response()->json(['data' => $term], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $term = Term::with('descriptions.ideas')->find($id);

        if (!$term) {
            return response()->json(['error' => 'Término no encontrado'], 404);
        }

        return response()->json(['data' => $term], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $term = Term::find($id);

        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:terms,name,' . $id,
            'type_id' => 'required|exists:types,id',
            'language_id' => 'required|exists:languages,id'
        ]);

        if($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $term->update($request->all());
        return response()->json(['data' => $term], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $term = Term::findOrFail($id);
            $term->delete();

            return response()->json(['message' => 'Término eliminado correctamente'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'No se pudo eliminar el término'], 500);
        }
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if ($token = JWTAuth::attempt($credentials)) {
            return response()->json(['token' => $token]);
        }

        return response()->json(['error' => 'Unauthorized'], 401);
    }
}
