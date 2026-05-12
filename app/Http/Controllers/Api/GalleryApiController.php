<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Support\Facades\Storage;

class GalleryApiController extends Controller
{
    public function index()
{
    return Gallery::with(['service.category'])
        ->where('status', true)
        ->latest()
        ->get()
        ->map(function ($item) {

            return [
                'id' => $item->id,
                'title' => $item->title,
                'description' => $item->description,

                // 🔥 AQUÍ EL FIX REAL
                'image' => $item->image
                    ? asset('storage/' . $item->image)
                    : null,

                'service' => [
                    'name' => $item->service?->name,
                ]
            ];
        });
}
}