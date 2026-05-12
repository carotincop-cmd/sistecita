<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    /**
     * Lista las galerías
     */
    public function index(Request $request)
    {
        $galleries = Gallery::with(['service.category'])

            // 🔍 Buscar por título
            ->when($request->search, function ($query) use ($request) {
                $query->where('title', 'like', '%' . $request->search . '%');
            })

            // 🔎 Filtrar por servicio
            ->when($request->service_id, function ($query) use ($request) {
                $query->where('service_id', $request->service_id);
            })

            // 🔎 Filtrar por estado
            ->when($request->status !== null && $request->status !== '', function ($query) use ($request) {
                $query->where('status', $request->status);
            })

            ->latest()
            ->paginate(8)
            ->withQueryString();

        // Servicios para filtros y modal
        $services = Service::with('category')
            ->where('status', true)
            ->orderBy('name')
            ->get();

        return view('admin.gallery.index', compact(
            'galleries',
            'services'
        ));
    }

    /**
     * Guardar galería
     */
    public function store(Request $request)
    {
        $request->validate([
            'service_id' => 'required|exists:services,id',
            'title'      => 'required|string|max:255',
            'image'      => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            'description'=> 'nullable|string',
            'status'     => 'required|in:1,0',
        ]);

        $imagePath = null;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')
                ->store('gallery', 'public');
        }

        Gallery::create([
            'service_id' => $request->service_id,
            'title'      => $request->title,
            'image'      => $imagePath,
            'description'=> $request->description,
            'status'     => $request->status == 1,
        ]);

        return redirect()->route('gallery.index')
            ->with('success', 'Trabajo agregado correctamente.');
    }

    /**
     * Actualizar galería
     */
    public function update(Request $request, $id)
    {
        $gallery = Gallery::findOrFail($id);

        $request->validate([
            'service_id' => 'required|exists:services,id',
            'title'      => 'required|string|max:255',
            'image'      => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'description'=> 'nullable|string',
            'status'     => 'required|in:1,0',
        ]);

        $imagePath = $gallery->image;

        if ($request->hasFile('image')) {

            // Eliminar imagen anterior
            if (
                $gallery->image &&
                Storage::disk('public')->exists($gallery->image)
            ) {
                Storage::disk('public')->delete($gallery->image);
            }

            $imagePath = $request->file('image')
                ->store('gallery', 'public');
        }

        $gallery->update([
            'service_id' => $request->service_id,
            'title'      => $request->title,
            'image'      => $imagePath,
            'description'=> $request->description,
            'status'     => (bool) $request->status,
        ]);

        return redirect()->route('gallery.index')
            ->with('success', 'Trabajo actualizado correctamente.');
    }

    /**
     * Eliminar galería
     */
    public function destroy($id)
    {
        $gallery = Gallery::findOrFail($id);

        // Eliminar imagen
        if (
            $gallery->image &&
            Storage::disk('public')->exists($gallery->image)
        ) {
            Storage::disk('public')->delete($gallery->image);
        }

        $gallery->delete();

        return redirect()->route('gallery.index')
            ->with('success', 'Trabajo eliminado correctamente.');
    }
}