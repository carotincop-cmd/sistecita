<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\ServiceCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    /**
     * Lista los servicios
     */
    public function index(Request $request)
    {
        $services = Service::with('category')

            // 🔍 Buscar por nombre de servicio
            ->when($request->search, function ($query) use ($request) {
                $query->where('name', 'like', '%' . $request->search . '%');
            })

            // 🔎 Filtrar por categoría
            ->when($request->category_id, function ($query) use ($request) {
                $query->where('category_id', $request->category_id);
            })

            // 🔎 Filtrar por estado
            ->when($request->status !== null && $request->status !== '', function ($query) use ($request) {
                $query->where('status', $request->status);
            })

            ->latest()
            ->paginate(5)
            ->withQueryString();

        // Categorías para filtro
        $categories = ServiceCategory::orderBy('name')->get();

        return view('admin.services.index', compact('services', 'categories'));
    }

    /**
     * Guarda un servicio
     */
    public function store(Request $request)
    {
    $request->validate([
        'category_id' => 'required|exists:service_categories,id',
        'name'        => 'required|string|max:255',
        'image'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        'description' => 'nullable|string',
        'price'       => 'nullable|numeric|min:0',
        'duration'    => 'required|integer|min:1',
        'status'      => 'required|in:1,0',
    ]);

      $imagePath = null;

    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('services', 'public');
    }

    Service::create([
        'category_id' => $request->category_id,
        'name'        => $request->name,
        'image'       => $imagePath,
        'description' => $request->description,
        'price'       => $request->price,
        'duration'    => $request->duration,
        'status'      => $request->status == 1,
    ]);

        return redirect()->route('services.index')
            ->with('success', 'Servicio creado correctamente.');
    }

    /**
     * Actualiza un servicio
     */
    public function update(Request $request, $id)
    {
        $service = Service::findOrFail($id);

        $request->validate([
            'category_id'         => 'required|exists:service_categories,id',
            'name'                => 'required|string|max:255',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'description'         => 'nullable|string',
            'price'               => 'nullable|numeric|min:0',
            'duration'            => 'required|integer|min:1',
            'status'              => 'required|in:0,1',
        ]);

        $imagePath = $service->image;

    if ($request->hasFile('image')) {

        // borrar anterior
        if ($service->image && Storage::disk('public')->exists($service->image)) {
            Storage::disk('public')->delete($service->image);
        }

        $imagePath = $request->file('image')->store('services', 'public');
    }

        $service->update([
            'category_id'         => $request->category_id,
            'name'                => $request->name,
            'image'       => $imagePath,
            'description'         => $request->description,
            'price'               => $request->price,
            'duration'            => $request->duration,
            'status'              => (bool) $request->status,
        ]);

        return redirect()->route('services.index')
            ->with('success', 'Servicio actualizado correctamente.');
    }

    /**
     * Elimina un servicio
     */
    public function destroy($id)
    {
        $service = Service::findOrFail($id);

        if ($service->image && Storage::disk('public')->exists($service->image)) {
        Storage::disk('public')->delete($service->image);
    }

     $service->delete();
     
        return redirect()->route('services.index')
            ->with('success', 'Servicio eliminado correctamente.');
    }
}