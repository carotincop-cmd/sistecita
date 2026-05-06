<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Carousel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CarouselController extends Controller
{
    /**
     * Mostrar listado
     */
    public function index()
    {
        $slides = Carousel::orderBy('position', 'asc')->get();

        return view('admin.carousel.index', compact('slides'));
    }

    /**
     * No se usa (modal dentro del index)
     */
    public function create()
    {
        abort(404);
    }

    /**
     * Guardar nuevo slide
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'       => 'nullable|string|max:255',
            'subtitle'    => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'image'       => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            'button_text' => 'nullable|string|max:255',
            'button_link' => 'nullable|string|max:255',
            'position'    => 'nullable|integer|min:0',
            'status'      => 'nullable',
        ]);

        $imagePath = null;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('hero', 'public');
        }

        Carousel::create([
            'title'       => $validated['title'] ?? null,
            'subtitle'    => $validated['subtitle'] ?? null,
            'description' => $validated['description'] ?? null,
            'image'       => $imagePath,
            'button_text' => $validated['button_text'] ?? null,
            'button_link' => $validated['button_link'] ?? null,
            'position'    => $validated['position'] ?? 0,
            'status'      => $request->has('status'),
        ]);

        return redirect()
            ->route('carousel.index')
            ->with('success', 'Slide creado correctamente.');
    }

    /**
     * No se usa
     */
    public function show(string $id)
    {
        abort(404);
    }

    /**
     * No se usa (modal dentro del index)
     */
    public function edit(string $id)
    {
        abort(404);
    }

    /**
     * Actualizar slide
     */
    public function update(Request $request, string $id)
    {
        $slide = Carousel::findOrFail($id);

        $validated = $request->validate([
            'title'       => 'nullable|string|max:255',
            'subtitle'    => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'button_text' => 'nullable|string|max:255',
            'button_link' => 'nullable|string|max:255',
            'position'    => 'nullable|integer|min:0',
            'status'      => 'nullable',
        ]);

        $imagePath = $slide->image;

        if ($request->hasFile('image')) {

            if ($slide->image && Storage::disk('public')->exists($slide->image)) {
                Storage::disk('public')->delete($slide->image);
            }

            $imagePath = $request->file('image')->store('hero', 'public');
        }

        $slide->update([
            'title'       => $validated['title'] ?? null,
            'subtitle'    => $validated['subtitle'] ?? null,
            'description' => $validated['description'] ?? null,
            'image'       => $imagePath,
            'button_text' => $validated['button_text'] ?? null,
            'button_link' => $validated['button_link'] ?? null,
            'position'    => $validated['position'] ?? 0,
            'status'      => $request->has('status'),
        ]);

        return redirect()
            ->route('carousel.index')
            ->with('success', 'Slide actualizado correctamente.');
    }

    /**
     * Eliminar slide
     */
    public function destroy(string $id)
    {
        $slide = Carousel::findOrFail($id);

        if ($slide->image && Storage::disk('public')->exists($slide->image)) {
            Storage::disk('public')->delete($slide->image);
        }

        $slide->delete();

        return redirect()
            ->route('carousel.index')
            ->with('success', 'Slide eliminado correctamente.');
    }
}