<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ServiceCategory;
use Illuminate\Http\Request;

class ServiceCategoryController extends Controller
{
    /**
     * Mostrar listado de categorías
     */
    public function index(Request $request)
    {
        $categories = ServiceCategory::query()

            // 🔍 Buscar por nombre
            ->when($request->search, function ($query) use ($request) {
                $query->where('name', 'like', '%' . $request->search . '%');
            })

            // 🔎 Filtrar por estado
            ->when($request->status !== null && $request->status !== '', function ($query) use ($request) {
                $query->where('status', $request->status);
            })

            ->orderBy('id', 'DESC')
            ->paginate(5)
            ->withQueryString(); // Mantiene los filtros en la paginación

        return view('admin.service-categories.index', compact('categories'));
    }

    /**
     * Guardar nueva categoría
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
            'status'      => 'required|boolean',
        ]);

        ServiceCategory::create($request->all());

        return redirect()
            ->route('service-categories.index')
            ->with('success', 'Categoría creada correctamente.');
    }

    /**
     * Actualizar categoría
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
            'status'      => 'required|boolean',
        ]);

        $category = ServiceCategory::findOrFail($id);
        $category->update($request->all());

        return redirect()
            ->route('service-categories.index')
            ->with('success', 'Categoría actualizada correctamente.');
    }

    /**
     * Eliminar categoría
     */
    public function destroy($id)
    {
        $category = ServiceCategory::findOrFail($id);
        $category->delete();

        return redirect()
            ->route('service-categories.index')
            ->with('success', 'Categoría eliminada correctamente.');
    }
}
