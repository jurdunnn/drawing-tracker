<?php

namespace App\Models;

use App\Http\Traits\TextHelperTrait;
use Carbon\Carbon;
use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

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

    public function getBase64ImageAttribute()
    {
        try {
            $download = Storage::download($this->file_path);

            $contentType = $download->headers->get('content-type');

            $contents = Storage::get($this->file_path);
        } catch (Exception $e) {
            Log::error($e);

            return '';
        }

        return "data:{$contentType};base64," . base64_encode($contents);
    }
}
