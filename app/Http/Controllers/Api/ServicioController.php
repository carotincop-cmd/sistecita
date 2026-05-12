<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;


class ServicioController extends Controller
{
    /**
     * Servicios activos para frontend cliente
     */
    public function index(Request $request)
    {
    $query = Service::with('category')
        ->where('status', 1);

    if ($request->category_id) {
        $query->where('category_id', $request->category_id);
    }

    $services = $query->latest()->get()->map(function ($service) {
        return [
            'id' => $service->id,
            'category_id' => $service->category_id,
            'category' => $service->category?->name,
            'name' => $service->name,
            'image' => $service->image ? asset('storage/' . $service->image) : null,
            'description' => $service->description,
            'price' => $service->price,
            'duration' => $service->duration,
        ];
    });

    return response()->json($services);
}
}