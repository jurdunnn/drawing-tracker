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

    protected static function booted(): void
    {
        static::deleting(function ($drawing) {
            Storage::delete($drawing->file_path);
        });

        static::updated(function ($drawing) {
            if ($drawing->wasChanged('file_path')) {
                Storage::delete($drawing->getOriginal('file_path'));
            }
        });
    }

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
        $userId = auth()->user()->id;

        try {
            Log::info("$userId requested image {$this->file_path}");

            $download = Storage::download($this->file_path);

            Log::info($download);

            $contentType = $download->headers->get('content-type');

            $contents = Storage::get($this->file_path);

            if ($contents) {
                Log::info("image has contents");
            }
        } catch (Exception $e) {
            Log::error($e->getMessage());

            return 'There was an error retrieving this drawing';
        }

        Log::info("Returning image");

        return "data:{$contentType};base64," . base64_encode($contents);
    }
}
