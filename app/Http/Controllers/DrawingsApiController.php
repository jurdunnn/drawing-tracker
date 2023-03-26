<?php

namespace App\Http\Controllers;

use App\Models\Drawing;
use Illuminate\Http\Request;

class DrawingsApiController extends Controller
{
    public function getDrawingImage(Drawing $drawing)
    {
        if (!auth()->user() || auth()->user()->id != $drawing->project->user->id) {
            abort(403, 'Not allowed');
        }

        return response()->json(['image' => $drawing->base64_image]);
    }
}
