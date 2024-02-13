<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Idea extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'language_id',
        'description_id',
    ];

    public function languages()
    {
        return $this->belongsTo(Language::class);
    }

    public function descriptions()
    {
        return $this->belongsTo(Description::class);
    }
}
