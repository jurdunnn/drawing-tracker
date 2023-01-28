<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpFoundation\Request;
use Illuminate\Support\Str;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'last_opened',
        'name',
        'description',
    ];

    public function color()
    {
        return $this->belongsTo(Color::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function drawings()
    {
        return $this->hasMany(Drawing::class);
    }

    public function showRoute()
    {
        return route('projects.index', ['project' => $this->id]);
    }

    public function isBeingViewed()
    {
        return Str::contains(url()->current(), "projects/{$this->id}");
    }

    public function getAbbreviatedNameAttribute()
    {
        $wordsInName = explode(' ', $this->name);

        $acronym = '';

        foreach ($wordsInName as $word) {
            $acronym .= mb_substr($word, 0, 1);
        }

        return $acronym;
    }
}
