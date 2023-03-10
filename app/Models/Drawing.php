<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Drawing extends Model
{
    use HasFactory;

    protected $casts = [
        'done' => 'boolean',
        'start_date' => 'date:Y-m-d',
        'due_date' => 'date:Y-m-d'
    ];

    protected $fillable = [
        'done',
        'tag_id',
        'name',
        'url',
        'due_date',
        'start_date',
    ];

    public function tag()
    {
        return $this->belongsTo(Tag::class);
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function showRoute()
    {
        return route('projects.drawings.edit', ['project' => $this->project->id, 'drawing' => $this->id]);
    }

    public function getFormattedStartDateAttribute()
    {
        return $this->formatDate($this->start_date);
    }

    public function getFormattedDueDateAttribute()
    {
        return $this->formatDate($this->due_date);
    }

    public function formatDate($date)
    {
        return Carbon::parse($date)->toFormattedDateString();
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
