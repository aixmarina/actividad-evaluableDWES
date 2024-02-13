<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Description extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'notes',
        'synthesis',
        'term_id',
        'user_id',
        'language_id',
    ];

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function evaluators()
    {
        return $this->belongsToMany(User::class, 'user_description')
            ->withPivot('rating')
            ->withTimestamps();
    }

    public function languages()
    {
        return $this->belongsTo(Language::class);
    }

    public function terms()
    {
        return $this->belongsTo(Term::class);
    }

    public function ideas()
    {
        return $this->hasMany(Idea::class);
    }
}
