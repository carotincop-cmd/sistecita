<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Mostrar lista de empleados (Index con modal).
     */
   public function index(Request $request)
    {
        // Empleados con su usuario y rol
        $employees = Employee::with(['user.role'])
            ->when($request->search, function ($query) use ($request) {
                $query->where(function ($q) use ($request) {
                    $q->where('first_name', 'like', '%' . $request->search . '%')
                      ->orWhere('last_name', 'like', '%' . $request->search . '%');
                });
            })
            ->when($request->status !== null && $request->status !== '', function ($query) use ($request) {
                $query->where('status', $request->status);
            })
            ->latest()
            ->paginate(5)
            ->withQueryString();

        // Roles disponibles para filtro
        $roles = \App\Models\Role::orderBy('name')->get();

        // Todos los usuarios Staff con relación employee
        $users = User::whereHas('role', fn($q) => $q->where('name', 'Staff'))
                     ->with('employee') // para saber si ya están asignados
                     ->orderBy('name')
                     ->get();

        return view('admin.employees.index', compact('employees', 'roles', 'users'));
    }

    /**
     * Guardar empleado nuevo.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id'     => 'nullable|exists:users,id',
            'first_name'  => 'required|string|max:100',
            'last_name'   => 'required|string|max:100',
            'phone'       => 'nullable|string|max:20',
            'specialty'   => 'nullable|string|max:255',
            'commission'  => 'nullable|numeric|min:0',
            'status'      => 'boolean',
            'work_start'  => 'nullable|date_format:H:i',
            'work_end'    => 'nullable|date_format:H:i',
            'days_off'    => 'nullable|array',
        ]);

        Employee::create($validated);

        return redirect()->route('employees.index')
                         ->with('success', 'Empleado creado correctamente.');
    }
    /**
     * Actualizar empleado.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'user_id'     => 'nullable|exists:users,id',
            'first_name'  => 'required|string|max:100',
            'last_name'   => 'required|string|max:100',
            'phone'       => 'nullable|string|max:20',
            'specialty'   => 'nullable|string|max:255',
            'commission'  => 'nullable|numeric|min:0',
            'status'      => 'boolean',
            'work_start'  => 'nullable|date_format:H:i',
            'work_end'    => 'nullable|date_format:H:i',
            'days_off'    => 'nullable|array',
        ]);

        $employee = Employee::findOrFail($id);
        $employee->update($validated);

        return redirect()->route('employees.index')
                         ->with('success', 'Empleado actualizado exitosamente.');
    }

    /**
     * Eliminar empleado.
     */
    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();

        return redirect()->route('employees.index')
                         ->with('success', 'Empleado eliminado correctamente.');
    }
}