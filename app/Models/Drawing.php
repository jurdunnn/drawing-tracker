<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Drawing extends Model
{
    use HasFactory;

    protected $casts = [
        'done' => 'boolean',
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
}
