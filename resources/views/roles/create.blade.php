@extends('layouts.admin')

@section('title','Crear Rol')

@section('content')

<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">

    {{-- Header --}}
    <div class="flex justify-between items-center mb-8">
        <h2 class="text-3xl font-bold text-pink-600"> Crear Nuevo Rol</h2>

        <a href="{{ route('roles.index') }}"
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

    {{-- Formulario --}}
    <div class="bg-white shadow-xl rounded-3xl p-8 border border-pink-100">
        <form action="{{ route('roles.store') }}" method="POST" class="space-y-7">
            @csrf

            {{-- Nombre --}}
            <div>
                <label class="block mb-2 font-semibold text-pink-700">Nombre del rol</label>
                <input
                    type="text"
                    name="name"
                    value="{{ old('name') }}"
                    class="w-full border border-pink-200 rounded-2xl px-4 py-3 focus:ring-2 focus:ring-pink-500 focus:border-pink-500 bg-pink-50/40"
                    required
                >
            </div>

            {{-- Descripción --}}
            <div>
                <label class="block mb-2 font-semibold text-pink-700">Descripción</label>
                <input
                    type="text"
                    name="description"
                    value="{{ old('description') }}"
                    class="w-full border border-pink-200 rounded-2xl px-4 py-3 focus:ring-2 focus:ring-pink-500 focus:border-pink-500 bg-pink-50/40"
                >
            </div>

            {{-- Módulos --}}
            <div>
                <label class="block mb-3 font-semibold text-pink-700">Módulos Permitidos</label>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    @foreach ($modules as $module)
                        <label class="flex items-center gap-3 border border-pink-200 rounded-2xl p-4 
                                     bg-white hover:bg-pink-50 cursor-pointer transition shadow-sm">
                            <input
                                type="checkbox"
                                name="modules[]"
                                value="{{ $module->id }}"
                                {{ in_array($module->id, old('modules', [])) ? 'checked' : '' }}
                                class="w-5 h-5 text-pink-600 rounded focus:ring-pink-500"
                            >
                            <span class="font-medium text-pink-700">{{ $module->name }}</span>
                        </label>
                    @endforeach
                </div>
            </div>

            {{-- Estado --}}
            <div>
                <label class="block mb-2 font-semibold text-pink-700">Estado</label>
                <select
                    name="status"
                    class="w-full border border-pink-200 rounded-2xl px-4 py-3 focus:ring-2 focus:ring-pink-500 bg-pink-50/40 text-pink-700"
                    required
                >
                    <option value="1">Activo</option>
                    <option value="0">Inactivo</option>
                </select>
            </div>

            {{-- Botones --}}
            <div class="flex justify-end gap-3 pt-4">

                <a href="{{ route('roles.index') }}"
                   class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-5 py-2 rounded-full shadow-md transition">
                    Cancelar
                </a>

                <button
                    type="submit"
                    class="bg-pink-600 hover:bg-pink-700 text-white px-5 py-2 rounded-2xl shadow transition">Guardar Usuario</button>
                </button>

            </div>
        </form>
    </div>
</div>

@endsection