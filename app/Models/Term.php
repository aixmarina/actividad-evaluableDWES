<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Term extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type_id',
        'language_id',
    ];

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function descriptions()
    {
        return $this->hasMany(Description::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function language()
    {
        return $this->belongsTo(Language::class);
    }
}
