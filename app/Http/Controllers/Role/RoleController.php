<?php

namespace App\Http\Controllers\Role;

use App\Http\Controllers\Controller;
use App\Models\Module;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class RoleController extends Controller
{
    public function index(Request $request)
    {
        // Filtros
        $search = $request->input('search');
        $status = $request->input('status');

        // Query base
        $query = Role::with('modules')->latest();

        // Filtro por nombre
        if (!empty($search)) {
            $query->where('name', 'LIKE', '%' . $search . '%');
        }

        // Filtro por estado
        if ($status !== null && $status !== '') {
            $query->where('status', $status);
        }

        // Paginación
        $roles = $query->paginate(5)->appends([
            'search' => $search,
            'status' => $status
        ]);
         $modules = Module::where('status', true)->orderBy('name')->get();

        return view('roles.index', compact('roles', 'search', 'status', 'modules'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:roles,name'],
            'description' => ['nullable', 'string', 'max:255'],
            'status' => ['required', 'boolean'],
            'modules' => ['nullable', 'array'],
            'modules.*' => ['exists:modules,id'],
        ]);

        $role = Role::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name, '_'),
            'description' => $request->description,
            'status' => $request->status,
        ]);

        $role->modules()->sync($request->modules ?? []);

        return redirect()
            ->route('roles.index')
            ->with('success', 'Rol creado correctamente.');
    }

    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('roles', 'name')->ignore($role->id),
            ],
            'description' => ['nullable', 'string', 'max:255'],
            'status' => ['required', 'boolean'],
            'modules' => ['nullable', 'array'],
            'modules.*' => ['exists:modules,id'],
        ]);

        $role->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name, '_'),
            'description' => $request->description,
            'status' => $request->status,
        ]);

        $role->modules()->sync($request->modules ?? []);

        return redirect()
            ->route('roles.index')
            ->with('success', 'Rol actualizado correctamente.');
    }

    public function destroy(Role $role)
    {
        if (in_array($role->slug, ['super_admin', 'admin', 'staff', 'recepcion'])) {
            return redirect()
                ->route('roles.index')
                ->with('error', 'No puedes eliminar un rol base del sistema.');
        }

        $role->delete();

        return redirect()
            ->route('roles.index')
            ->with('success', 'Rol eliminado correctamente.');
    }
}