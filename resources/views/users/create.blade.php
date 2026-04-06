@extends('layouts.admin')

@section('title','Crear Usuario')

@section('content')

<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">

    {{-- Header --}}
    <div class="flex justify-between items-center mb-8">
        <h2 class="text-3xl font-bold text-pink-600"> Crear Nuevo Usuario</h2>

        <a href="{{ route('users.index') }}"
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

        <form action="{{ route('users.store') }}" method="POST" class="space-y-7">
            @csrf

            {{-- Nombre --}}
            <div>
                <label class="block mb-2 font-semibold text-pink-700">Nombre</label>
                <input
                    type="text"
                    name="name"
                    value="{{ old('name') }}"
                    class="w-full border border-pink-200 rounded-2xl px-4 py-3 
                           focus:ring-2 focus:ring-pink-500 focus:border-pink-500 bg-pink-50/40"
                    required
                >
            </div>

            {{-- Correo --}}
            <div>
                <label class="block mb-2 font-semibold text-pink-700">Correo</label>
                <input
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    class="w-full border border-pink-200 rounded-2xl px-4 py-3 
                           focus:ring-2 focus:ring-pink-500 focus:border-pink-500 bg-pink-50/40"
                    required
                >
            </div>

            {{-- Contraseñas --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                
                {{-- Password --}}
                <div>
                    <label class="block mb-2 font-semibold text-pink-700">Contraseña</label>
                    <input
                        type="password"
                        name="password"
                        class="w-full border border-pink-200 rounded-2xl px-4 py-3 
                               focus:ring-2 focus:ring-pink-500 focus:border-pink-500 bg-pink-50/40"
                        required
                    >
                </div>

                {{-- Confirmación --}}
                <div>
                    <label class="block mb-2 font-semibold text-pink-700">Confirmar contraseña</label>
                    <input
                        type="password"
                        name="password_confirmation"
                        class="w-full border border-pink-200 rounded-2xl px-4 py-3 
                               focus:ring-2 focus:ring-pink-500 focus:border-pink-500 bg-pink-50/40"
                        required
                    >
                </div>

            </div>

            {{-- Rol + Estado --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                {{-- Rol --}}
                <div>
                    <label class="block mb-2 font-semibold text-pink-700">Rol</label>
                    <select
                        name="role_id"
                        class="w-full border border-pink-200 rounded-2xl px-4 py-3 
                               focus:ring-2 focus:ring-pink-500 bg-pink-50/40 text-pink-700"
                        required
                    >
                        <option value="" class="text-pink-600">Seleccione un rol</option>

                        @foreach ($roles as $role)
                            <option value="{{ $role->id }}" class="text-pink-700"
                                {{ old('role_id') == $role->id ? 'selected' : '' }}>
                                {{ $role->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Estado --}}
                <div>
                    <label class="block mb-2 font-semibold text-pink-700">Estado</label>
                    <select
                        name="status"
                        class="w-full border border-pink-200 rounded-2xl px-4 py-3 
                               focus:ring-2 focus:ring-pink-500 bg-pink-50/40 text-pink-700"
                        required
                    >
                        <option value="1" {{ old('status','1') == '1' ? 'selected' : '' }}>Activo</option>
                        <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>Inactivo</option>
                    </select>
                </div>

            </div>

            {{-- Botones --}}
            <div class="flex justify-end gap-3 pt-4">

                <a href="{{ route('users.index') }}"
                   class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-5 py-2 rounded-full shadow-md transition">
                    Cancelar
                </a>

                <button
                    type="submit"
                    class="bg-pink-600 hover:bg-pink-700 text-white px-5 py-2 rounded-2xl shadow transition">
                    Guardar Usuario
                </button>

            </div>

        </form>

    </div>

</div>

@endsection