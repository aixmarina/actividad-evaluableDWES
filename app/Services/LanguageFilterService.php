<?php

namespace App\Services;

use App\Models\Term;
use App\Models\Description;

class LanguageFilterService
{
    public function filterTerms($language)
    {
        return Term::where('language_id', $language)->get();
    }

    public function filterDescriptions($language)
    {
        return Description::where('language_id', $language)->get();
    }
}
