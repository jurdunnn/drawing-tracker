<?php

namespace App\Models;

use App\Http\Traits\TextHelperTrait;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Drawing extends Model
{
    use HasFactory;
    use TextHelperTrait;

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
}
