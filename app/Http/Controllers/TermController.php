<?php

namespace App\Http\Controllers;

use App\Models\Language;
use App\Models\Term;
use App\Services\LanguageFilterService;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class TermController extends Controller
{
    protected $languageFilterService;

    public function __construct(LanguageFilterService $languageFilterService)
    {
        $this->languageFilterService = $languageFilterService;
    }

    public function index()
    {
        $isoCode = app()->getLocale();
        $languageId = Language::where('iso_code', $isoCode)->value('id');

        $terms = $this->languageFilterService->filterTerms($languageId);

        $userTerms = request('user_terms');
        $otherTerms = request('other_terms');

        $user = auth()->user();
        $userId = $user->id;

        if ($userTerms) {
            $terms = $terms->filter(function ($term) use ($user) {
                return $term->users->contains($user);
            });
        } elseif ($otherTerms) {
            $terms = $terms->reject(function ($term) use ($userId) {
                return $term->user_id === $userId;
            });
        }

        return view('terms.index', [
            'terms' => $terms
        ]);
    }
    public function show(Term $term)
    {
        return view('terms.show', [
            'term' => $term
        ]);
    }

    public function edit(Term $term)
    {
        return view('terms.edit', [
            'term' => $term
        ]);
    }

    public function update(Term $term)
    {
        $attributes = request()->validate([
            'name' => ['required', Rule::unique('terms', 'name')->ignore($term)],
            'type_id' => ['required', Rule::exists('types', 'id')],
            'language_id' => ['required', Rule::exists('languages', 'id')]
        ]);

        $term->update($attributes);
        return redirect('terms');
    }

    public function create()
    {
        return view('terms.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'name' => ['required', Rule::unique('terms', 'name')],
            'type_id' => ['required', Rule::exists('types', 'id')],
            'language_id' => ['required', Rule::exists('languages', 'id')]
        ]);

        Term::create($attributes);
        return redirect('terms');
    }

    public function destroy(Term $term)
    {
        $term->delete();
        return back();
    }
}
