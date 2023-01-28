<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    public function color()
    {
        return $this->hasOne(Color::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function drawings()
    {
        return $this->hasMany(Drawing::class);
    }
}
