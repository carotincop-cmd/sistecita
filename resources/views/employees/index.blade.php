@extends('layouts.admin')

@section('title','Gestión de Empleados')

@section('content')

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

    <!-- TÍTULO Y BOTÓN -->
    <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between mb-6 gap-4">
        <h2 class="text-2xl font-bold mb-6 text-pink-600">✨ Lista de Empleados</h2>

        <a href="{{ route('employees.create') }}"
           class="bg-pink-600 hover:bg-pink-700 text-white px-4 py-2 rounded-full shadow transition">
            + CREAR NUEVO EMPLEADO
        </a>
    </div>
<!-- filtros -->
    <form method="GET" class="mb-4">

    <div class="flex flex-col sm:flex-row items-end gap-4">

        <!-- Buscar empleado -->
        <div class="w-56">
            <label class="text-pink-700 font-semibold text-sm">Buscar empleado</label>
            <input type="text"
                   name="search"
                   value="{{ request('search') }}"
                   placeholder="Ej: Juan Perez"
                   class="w-full mt-1 h-[38px] p-2 rounded-lg border border-pink-300 bg-white 
                          text-pink-700 placeholder-pink-400 text-sm">
        </div>

        <!-- Filtrar por estado -->
        <div class="w-28">
            <label class="text-pink-700 font-semibold text-sm">Estado</label>
            <select name="status"
                    class="w-full mt-1 h-[38px] p-2 rounded-lg border border-pink-300 bg-white text-pink-700 text-sm">
                <option value="">Todos</option>
                <option value="1" {{ request('status') === '1' ? 'selected' : '' }}>Activo</option>
                <option value="0" {{ request('status') === '0' ? 'selected' : '' }}>Inactivo</option>
            </select>
        </div>

        <!-- Botones -->
        <div class="flex gap-3 items-end">

            <button class="px-4 py-1.5 h-[38px] bg-pink-600 hover:bg-pink-700 text-white 
                           rounded-lg shadow text-sm transition flex items-center">
                Filtrar
            </button>

            <a href="{{ route('employees.index') }}"
               class="px-4 py-1.5 h-[38px] border border-pink-300
                      text-pink-700 rounded-lg shadow text-sm hover:bg-pink-50 transition flex items-center">
                Limpiar
            </a>

        </div>

    </div>

</form>

    <!-- ALERTAS -->
    @if(session('success'))
        <div class="bg-green-50 border border-green-200 text-green-700 p-3 rounded mb-4 transition">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="bg-red-50 border border-red-200 text-red-700 p-3 rounded mb-4 transition">
            {{ session('error') }}
        </div>
    @endif

    <!-- TABLA -->
    <div class="overflow-x-auto rounded-2xl shadow-xl border border-pink-200 bg-white">

        <table class="w-full text-sm text-left border-collapse">

            <!-- ENCABEZADO CON DEGRADADO IDENTICO AL DE USUARIOS -->
            <thead class="bg-gradient-to-r from-pink-500 to-pink-600 text-white uppercase text-xs tracking-wide shadow-md">
                <tr>
                    <th class="px-6 py-3">ID</th>
                    <th class="px-6 py-3">Nombre</th>
                    <th class="px-6 py-3">Teléfono</th>
                    <th class="px-6 py-3">Especialidad</th>
                    <th class="px-6 py-3">Rol</th>
                    <th class="px-6 py-3">Horario</th>
                    <th class="px-6 py-3">Días Libres</th>
                    <th class="px-6 py-3">Estado</th>
                    <th class="px-6 py-3 text-right">Acciones</th>
                </tr>
            </thead>

            <tbody class="divide-y divide-pink-100">

                @forelse($employees as $employee)
                <tr class="hover:bg-pink-50 transition duration-300">

                    <!-- ID -->
                    <td class="px-6 py-3 text-pink-700 font-semibold">
                        {{ $employee->id }}
                    </td>

                    <!-- Nombre -->
                    <td class="px-6 py-3 font-medium text-pink-800">
                        {{ $employee->first_name }} {{ $employee->last_name }}
                    </td>

                    <!-- Teléfono -->
                    <td class="px-6 py-3 text-pink-600">
                        {{ $employee->phone ?? '—' }}
                    </td>

                    <!-- Especialidad -->
                    <td class="px-6 py-3 text-pink-600">
                        {{ $employee->specialty ?? '—' }}
                    </td>

                    <!-- Rol -->
                    <td class="px-6 py-3">
                        <span class="bg-pink-100 text-pink-700 px-3 py-1 rounded-full text-xs font-semibold shadow-sm border border-pink-200">
                            {{ $employee->user->role->name ?? 'Sin Rol' }}
                        </span>
                    </td>

                    <!-- Horario -->
                    <td class="px-6 py-3 text-pink-600">
                        @if($employee->work_start && $employee->work_end)
                            {{ $employee->work_start->format('H:i') }} - {{ $employee->work_end->format('H:i') }}
                        @else
                            —
                        @endif
                    </td>

                    <!-- Días Libres -->
                    <td class="px-6 py-3">
                        @if($employee->days_off)
                            <div class="flex flex-wrap gap-2">

                                @php
                                    $daysTranslate = [
                                        'monday' => 'Lunes',
                                        'tuesday' => 'Martes',
                                        'wednesday' => 'Miércoles',
                                        'thursday' => 'Jueves',
                                        'friday' => 'Viernes',
                                        'saturday' => 'Sábado',
                                        'sunday' => 'Domingo',
                                    ];
                                @endphp

                                @foreach($employee->days_off as $day)
                                    <span class="bg-pink-100 text-pink-700 px-2 py-1 rounded-full text-xs font-semibold shadow-sm border border-pink-200">
                                        {{ $daysTranslate[$day] ?? $day }}
                                    </span>
                                @endforeach
                            </div>
                        @else
                            —
                        @endif
                    </td>

                    <!-- Estado -->
                    <td class="px-6 py-3">
                        @if($employee->status)
                            <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-semibold shadow-sm">
                                Activo
                            </span>
                        @else
                            <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-xs font-semibold shadow-sm">
                                Inactivo
                            </span>
                        @endif
                    </td>

                    <!-- ACCIONES -->
                    <td class="px-6 py-3 text-right flex justify-end gap-2">

                        <!-- EDITAR -->
                        <a href="{{ route('employees.edit', $employee->id) }}"
                           class="bg-pink-500 hover:bg-pink-600 text-white px-3 py-1 rounded-full text-xs font-medium transition shadow">
                            Editar
                        </a>

                        <!-- ELIMINAR -->
                        <form action="{{ route('employees.destroy', $employee->id) }}"
                              method="POST"
                              onsubmit="return confirm('¿Eliminar empleado?')">
                            @csrf
                            @method('DELETE')

                            <button class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded-full text-xs font-medium transition shadow">
                                Eliminar
                            </button>
                        </form>

                    </td>

                </tr>
                @empty
                <tr>
                    <td colspan="9" class="text-center py-6 text-pink-400 font-medium">
                        No hay empleados registrados
                    </td>
                </tr>
                @endforelse

            </tbody>

        </table>
    </div>

    <!-- PAGINACIÓN -->
    <div class="mt-6">
        {{ $employees->links() }}
    </div>

</div>

@endsection