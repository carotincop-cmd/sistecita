@extends('layouts.admin')

@section('title','Gestión de Servicios')

@section('content')

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

    {{-- TÍTULO + BOTÓN --}}
    <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between mb-6 gap-4">
        <h2 class="text-2xl font-bold text-pink-600">✨ Lista de Servicios</h2>

        <a href="{{ route('services.create') }}"
           class="bg-pink-600 hover:bg-pink-700 text-white px-4 py-2 rounded-2xl shadow transition">
            + NUEVO SERVICIO
        </a>
    </div>
{{-- filtros --}}

<form method="GET" class="mb-4">

    <div class="flex flex-col sm:flex-row items-end gap-4">

        <!-- Buscar servicio -->
        <div class="w-56">
            <label class="text-pink-700 font-semibold text-sm">Buscar servicio</label>
            <input type="text"
                   name="search"
                   value="{{ request('search') }}"
                   placeholder="Ej: Corte, Tinte"
                   class="w-full mt-1 h-[38px] p-2 rounded-lg border border-pink-300 bg-white 
                          text-pink-700 placeholder-pink-400 text-sm">
        </div>

        <!-- Filtrar por categoría -->
        <div class="w-40">
            <label class="text-pink-700 font-semibold text-sm">Categoría</label>
            <select name="category_id"
                    class="w-full mt-1 h-[38px] p-2 rounded-lg border border-pink-300 
                           bg-white text-pink-700 text-sm">
                <option value="">Todas</option>
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}" 
                        {{ request('category_id') == $cat->id ? 'selected' : '' }}>
                        {{ $cat->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Estado -->
        <div class="w-28">
            <label class="text-pink-700 font-semibold text-sm">Estado</label>
            <select name="status"
                    class="w-full mt-1 h-[38px] p-2 rounded-lg border border-pink-300 
                           bg-white text-pink-700 text-sm">
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

            <a href="{{ route('services.index') }}"
               class="px-4 py-1.5 h-[38px] border border-pink-300 text-pink-700 
                      rounded-lg shadow text-sm hover:bg-pink-50 transition flex items-center">
                Limpiar
            </a>

        </div>

    </div>

</form>
    {{-- MENSAJES --}}
    @if(session('success'))
        <div class="bg-green-100 border border-green-300 text-green-700 p-3 rounded-xl mb-4">
            {{ session('success') }}
        </div>
    @endif

    {{-- TABLA --}}
    <div class="overflow-x-auto rounded-2xl shadow-xl border border-pink-200 bg-white">

        <table class="w-full text-sm text-left border-collapse">

            {{-- ENCABEZADO --}}
            <thead class="bg-gradient-to-r from-pink-500 to-pink-600 text-white uppercase text-xs tracking-wide shadow-md">
                <tr>
                    <th class="px-6 py-3">ID</th>
                    <th class="px-6 py-3">Categoría</th>
                    <th class="px-6 py-3">Nombre</th>
                    <th class="px-6 py-3 text-right">Precio</th>
                    <th class="px-6 py-3 text-center">Duración</th>
                    <th class="px-6 py-3 text-center">Estado</th>
                    <th class="px-6 py-3 text-right">Acciones</th>
                </tr>
            </thead>

            {{-- FILAS --}}
            <tbody class="divide-y divide-pink-100">

                @forelse($services as $service)
                <tr class="hover:bg-pink-50 transition duration-300">

                    {{-- ID --}}
                    <td class="px-6 py-3 text-pink-700 font-semibold">
                        {{ $service->id }}
                    </td>

                    {{-- Categoría --}}
                    <td class="px-6 py-3 text-pink-800">
                        {{ $service->category->name ?? '—' }}
                    </td>

                    {{-- Nombre --}}
                    <td class="px-6 py-3 font-medium text-pink-900">
                        {{ $service->name }}
                    </td>

                    {{-- Precio --}}
                    <td class="px-6 py-3 text-right text-pink-900">
                        S/ {{ number_format($service->price, 2) }}
                    </td>

                    {{-- Duración --}}
                    <td class="px-6 py-3 text-center text-pink-900">
                        {{ $service->duration }} min
                    </td>

                    {{-- Estado --}}
                    <td class="px-6 py-3 text-center">
                        @if($service->status == 'active')
                            <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-semibold">
                                Activo
                            </span>
                        @else
                            <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-xs font-semibold">
                                Inactivo
                            </span>
                        @endif
                    </td>

                    {{-- Acciones --}}
                    <td class="px-6 py-3 text-right flex justify-end gap-2">

                        <a href="{{ route('services.edit', $service->id) }}"
                       class="bg-pink-500 hover:bg-pink-600 text-white px-3 py-1 rounded-full text-xs font-medium transition shadow">
                            Editar
                        </a>

                        <form action="{{ route('services.destroy', $service->id) }}"
                              method="POST"
                              onsubmit="return confirm('¿Eliminar servicio?')">
                            @csrf
                            @method('DELETE')

                            <button class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded-full text-xs shadow transition">
                                Eliminar
                            </button>
                        </form>

                    </td>

                </tr>

                @empty
                <tr>
                    <td colspan="7" class="text-center py-6 text-pink-400 font-medium">
                        No hay servicios registrados
                    </td>
                </tr>
                @endforelse

            </tbody>

        </table>
    </div>

    {{-- PAGINACIÓN --}}
    <div class="mt-6">
        {{ $services->links() }}
    </div>

</div>

@endsection