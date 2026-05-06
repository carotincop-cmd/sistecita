<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ServiceCategory;

class CategoryController extends Controller
{
    /**
     * Categorías activas para frontend cliente
     */
    public function index()
    {
        $categories = ServiceCategory::where('status', 1)
            ->orderBy('id', 'desc')
            ->get()
            ->map(function ($category) {
                return [
                    'id'          => $category->id,
                    'name'        => $category->name,
                    'description' => $category->description,
                    'image'       => $category->image
                        ? asset('storage/' . $category->image)
                        : null,
                ];
            });

        return response()->json($categories);
    }
}