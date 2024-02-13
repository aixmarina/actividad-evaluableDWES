<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'model'
    ];

    public function scopeFilter($query, array $filters)
    {
        $query->when(isset($filters['model']), function ($query) use ($filters) {
            return $query->where('model', $filters['model']);
        });
    }

    public function terms()
    {
        return $this->hasMany(Term::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
