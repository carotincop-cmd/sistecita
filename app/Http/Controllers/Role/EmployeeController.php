<?php

namespace App\Http\Controllers\Role;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Mostrar lista de empleados.
     */
    public function index(Request $request)
    {
        $employees = Employee::with(['user.role'])
            // FILTRAR POR NOMBRE (first_name + last_name)
            ->when($request->search, function ($query) use ($request) {
                $query->where(function ($q) use ($request) {
                    $q->where('first_name', 'like', '%' . $request->search . '%')
                    ->orWhere('last_name', 'like', '%' . $request->search . '%');
                });
            })

            // FILTRAR POR ESTADO
            ->when($request->status !== null && $request->status !== '', function ($query) use ($request) {
                $query->where('status', $request->status);
            })

            ->latest()
            ->paginate(5)
            ->withQueryString(); // mantiene filtros en la paginación

        // Roles disponibles para filtrar
        $roles = \App\Models\Role::orderBy('name')->get();

        return view('employees.index', compact('employees', 'roles'));
    }

    /**
     * Mostrar formulario de creación.
     */
    public function create()
    {
    $users = User::whereHas('role', function($q){
            $q->where('name', 'Staff');
        })
        ->whereDoesntHave('employee') // evita usuarios ya usados
        ->get();

    return view('employees.create', compact('users'));
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

        return redirect()
            ->route('employees.index')
            ->with('success', 'Empleado creado correctamente.');
    }

    /**
     * Mostrar información de un empleado.
     */
    public function show($id)
    {
        $employee = Employee::with('user')->findOrFail($id);

        return view('employees.show', compact('employee'));
    }

    /**
     * Formulario para editar empleado.
     */
    public function edit($id)
    {
    $employee = Employee::findOrFail($id);

    // Obtener solo usuarios Staff y disponibles + el asociado actual
    $users = User::whereHas('role', function($q) {
            $q->where('name', 'Staff');
        })
        ->where(function($q) use ($employee) {
            $q->whereDoesntHave('employee')   // usuarios libres
              ->orWhere('id', $employee->user_id); // usuario actual
        })
        ->orderBy('name')
        ->get();

    // Decodificar días libres
    $employee->days_off = is_string($employee->days_off)
        ? json_decode($employee->days_off, true)
        : ($employee->days_off ?? []);

    return view('employees.edit', compact('employee', 'users'));
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

        return redirect()
            ->route('employees.index')
            ->with('success', 'Empleado actualizado exitosamente.');
    }

    /**
     * Eliminar empleado.
     */
    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();

        return redirect()
            ->route('employees.index')
            ->with('success', 'Empleado eliminado correctamente.');
    }
}