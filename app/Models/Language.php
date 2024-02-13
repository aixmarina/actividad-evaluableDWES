<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'iso_code',
    ];

    public function descriptions()
    {
        return $this->hasMany(Description::class);
    }

    public function ideas()
    {
        return $this->hasMany(Idea::class);
    }

    public function terms()
    {
        return $this->hasMany(Term::class);
    }
}
