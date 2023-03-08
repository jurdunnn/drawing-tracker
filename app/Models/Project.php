<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Request;
use Illuminate\Support\Str;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'last_opened',
        'name',
        'description',
        'color_id',
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

    public function showTags()
    {
        return $this->hasMany(ProjectShowTag::class);
    }

    public function taggedDrawings(Tag $tag): Collection | bool
    {
        if ($this->showTags()->where('tag_id', $tag->id)->exists()) {
            return false;
        }

        $drawings = $this->drawings()->where('tag_id', $tag->id);

        return $drawings->doesntExist() ? false : $drawings->get();
    }

    public function indexRoute()
    {
        return route('projects.index');
    }

    public function showRoute()
    {
        return route('projects.drawings.index', ['project' => $this->id]);
    }

    public function editRoute()
    {
        return route('projects.edit', ['project' => $this->id]);
    }

    public function isBeingViewed()
    {
        return Str::contains(url()->current(), "projects/{$this->id}/");
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
