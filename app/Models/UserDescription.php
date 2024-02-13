<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDescription extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'description_id', 'rating'];

    // Relación con el usuario que realizó la valoración
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relación con la descripción que fue valorada
    public function description()
    {
        return $this->belongsTo(Description::class);
    }
}
