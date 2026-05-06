<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Carousel;

class CarouselController extends Controller
{
    /**
     * Slides públicos para frontend cliente
     */
    public function index()
    {
        $slides = Carousel::where('status', true)
            ->orderBy('position', 'asc')
            ->get()
            ->map(function ($slide) {
                return [
                    'id'          => $slide->id,
                    'title'       => $slide->title,
                    'subtitle'    => $slide->subtitle,
                    'description' => $slide->description,
                    'image'       => asset('storage/' . $slide->image),
                    'button_text' => $slide->button_text,
                    'button_link' => $slide->button_link,
                    'position'    => $slide->position,
                ];
            });

        return response()->json($slides);
    }
}