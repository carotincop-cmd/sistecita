@extends('layouts.admin')

@section('title','Editar Empleado')

@section('content')

<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">

    {{-- Header --}}
    <div class="flex justify-between items-center mb-8">
        <h2 class="text-3xl font-bold text-pink-600">Editar Empleado</h2>

        <a href="{{ route('employees.index') }}"
           class="bg-gradient-to-r from-pink-400 to-pink-600 hover:to-pink-700 text-white px-5 py-2 rounded-full shadow-md transition">
            ← Volver
        </a>
    </div>

    {{-- Errores --}}
    @if ($errors->any())
        <div class="bg-red-100 border border-red-300 text-red-700 p-4 rounded-xl mb-6">
            <ul class="list-disc pl-5 space-y-1">
                @foreach ($errors->all() as $error)
                    <li class="font-medium">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Contenedor --}}
    <div class="bg-white shadow-xl rounded-3xl p-8 border border-pink-100">
        <form action="{{ route('employees.update', $employee->id) }}" method="POST" class="space-y-7">
            @csrf
            @method('PUT')

            {{-- Usuario Asociado --}}
            <div>
                <label class="block mb-2 font-semibold text-pink-700">Usuario Asociado</label>
                <select name="user_id"
                    class="w-full border border-pink-200 rounded-2xl px-4 py-3 bg-pink-50/40 text-pink-700 
                           focus:ring-2 focus:ring-pink-500">
                    <option value="">-- Seleccionar usuario --</option>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}" 
                            @selected(old('user_id', $employee->user_id) == $user->id)>
                            {{ $user->name }} ({{ $user->email }})
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Nombres y Apellidos --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <div>
                    <label class="block mb-2 font-semibold text-pink-700">Nombres</label>
                    <input type="text" 
                        name="first_name" 
                        value="{{ old('first_name', $employee->first_name) }}"
                        class="w-full border border-pink-200 rounded-2xl px-4 py-3 bg-pink-50/40 
                               focus:ring-2 focus:ring-pink-500 text-pink-700">
                </div>

                <div>
                    <label class="block mb-2 font-semibold text-pink-700">Apellidos</label>
                    <input type="text" 
                        name="last_name" 
                        value="{{ old('last_name', $employee->last_name) }}"
                        class="w-full border border-pink-200 rounded-2xl px-4 py-3 bg-pink-50/40 
                               focus:ring-2 focus:ring-pink-500 text-pink-700">
                </div>

            </div>

            {{-- Teléfono y Comisión --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <div>
                    <label class="block mb-2 font-semibold text-pink-700">Teléfono</label>
                    <input type="text" 
                        name="phone" 
                        value="{{ old('phone', $employee->phone) }}"
                        class="w-full border border-pink-200 rounded-2xl px-4 py-3 bg-pink-50/40 
                               focus:ring-2 focus:ring-pink-500 text-pink-700">
                </div>

                <div>
                    <label class="block mb-2 font-semibold text-pink-700">Comisión (%)</label>
                    <input type="number" 
                        name="commission" 
                        value="{{ old('commission', $employee->commission) }}"
                        class="w-full border border-pink-200 rounded-2xl px-4 py-3 bg-pink-50/40 
                               focus:ring-2 focus:ring-pink-500 text-pink-700">
                </div>

            </div>

            {{-- Especialidad --}}
            <div>
                <label class="block mb-2 font-semibold text-pink-700">Especialidad</label>

                @php
                    $specialties = ["Manicurista","Pedicurista","Nail Artist","Acrílicas","Gel","Gelish","Esculpidas","Decoración 3D"];
                @endphp

                <select name="specialty"
                    class="w-full border border-pink-200 rounded-2xl px-4 py-3 bg-pink-50/40 text-pink-700 
                           focus:ring-2 focus:ring-pink-500">
                    <option value="">Seleccione una especialidad</option>

                    @foreach($specialties as $spec)
                        <option value="{{ $spec }}" 
                            @selected(old('specialty', $employee->specialty)==$spec)>
                            {{ $spec }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Horario Laboral --}}
            <h3 class="text-lg font-semibold text-pink-700 mt-4">Horario Laboral</h3>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <div>
                    <label class="block mb-2 font-semibold text-pink-700">Hora Inicio</label>
                    <input type="time"
                        name="work_start"
                        value="{{ old('work_start', $employee->work_start) }}"
                        class="w-full border border-pink-200 rounded-2xl px-4 py-3 bg-pink-50/40 
                               text-pink-700 focus:ring-2 focus:ring-pink-500">
                </div>

                <div>
                    <label class="block mb-2 font-semibold text-pink-700">Hora Fin</label>
                    <input type="time"
                        name="work_end"
                        value="{{ old('work_end', $employee->work_end) }}"
                        class="w-full border border-pink-200 rounded-2xl px-4 py-3 bg-pink-50/40 
                               text-pink-700 focus:ring-2 focus:ring-pink-500">
                </div>

            </div>

            {{-- Días Libres --}}
            <div>
                <label class="block mb-2 font-semibold text-pink-700">Días Libres</label>

                @php
                    $weekDays = [
                        'monday'=>'Lunes','tuesday'=>'Martes','wednesday'=>'Miércoles',
                        'thursday'=>'Jueves','friday'=>'Viernes','saturday'=>'Sábado','sunday'=>'Domingo'
                    ];

                    $currentDaysOff = is_array($employee->days_off) ? $employee->days_off : [];
                @endphp

                <div class="grid grid-cols-3 gap-3">

                    @foreach($weekDays as $key=>$label)
                        <label class="flex items-center gap-2 text-pink-700">
                            <input type="checkbox" 
                                name="days_off[]" 
                                value="{{ $key }}"
                                class="w-5 h-5 text-pink-600 rounded border-pink-300 focus:ring-pink-500"
                                @checked(in_array($key, old('days_off', $currentDaysOff)))>
                            {{ $label }}
                        </label>
                    @endforeach

                </div>
            </div>

            {{-- Estado --}}
            <div>
                <label class="block mb-2 font-semibold text-pink-700">Estado</label>

                <select name="status"
                    class="w-full border border-pink-200 rounded-2xl px-4 py-3 bg-pink-50/40 
                           text-pink-700 focus:ring-2 focus:ring-pink-500">
                    <option value="1" @selected(old('status', $employee->status)==1)>Activo</option>
                    <option value="0" @selected(old('status', $employee->status)==0)>Inactivo</option>
                </select>
            </div>

            {{-- Botón --}}
            <div class="flex justify-end pt-4">
                <button type="submit"
                    class="bg-pink-600 hover:bg-pink-700 text-white px-5 py-2 rounded-2xl shadow transition">
                    Guardar Cambios
                </button>
            </div>

        </form>
    </div>
</div>

@endsection