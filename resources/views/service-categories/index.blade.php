@extends('layouts.admin')

@section('title','Gestión de Categorías de Servicios')

@section('content')

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

    <!-- TÍTULO + BOTÓN -->
    <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between mb-6 gap-4">
        <h2 class="text-2xl font-bold mb-6 text-pink-600">✨ Lista de Categorías</h2>

        <a href="{{ route('service-categories.create') }}"
           class="bg-pink-600 hover:bg-pink-700 text-white px-4 py-2 rounded-2xl shadow transition">
            + Nueva Categoría
        </a>
    </div>

    <!-- filtros -->
    <form method="GET" class="mb-4">

    <div class="flex flex-col sm:flex-row items-end gap-4">

        <!-- Buscar categoría -->
        <div class="w-56">
            <label class="text-pink-700 font-semibold text-sm">Buscar categoría</label>
            <input type="text"
                   name="search"
                   value="{{ request('search') }}"
                   placeholder="Ej: Corte, Uñas"
                   class="w-full mt-1 h-[38px] p-2 rounded-lg border border-pink-300 bg-white 
                          text-pink-700 placeholder-pink-400 text-sm">
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

            <a href="{{ route('service-categories.index') }}"
               class="px-4 py-1.5 h-[38px] border border-pink-300 text-pink-700 
                      rounded-lg shadow text-sm hover:bg-pink-50 transition flex items-center">
                Limpiar
            </a>

        </div>

    </div>

</form>
    <!-- MENSAJES -->
    @if(session('success'))
        <div class="bg-green-100 border border-green-300 text-green-700 p-3 rounded-xl mb-4">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="bg-red-100 border border-red-300 text-red-700 p-3 rounded-xl mb-4">
            {{ session('error') }}
        </div>
    @endif

    <!-- TABLA -->
    <div class="overflow-x-auto rounded-2xl shadow-xl border border-pink-200 bg-white">

        <table class="w-full text-sm text-left border-collapse">

            <!-- HEADER ROSADO -->
            <thead class="bg-gradient-to-r from-pink-500 to-pink-600 text-white uppercase text-xs tracking-wide shadow-md">
                <tr>
                    <th class="px-6 py-3">ID</th>
                    <th class="px-6 py-3">Nombre</th>
                    <th class="px-6 py-3">Descripción</th>
                    <th class="px-6 py-3 text-center">Estado</th>
                    <th class="px-6 py-3 text-right">Acciones</th>
                </tr>
            </thead>

            <tbody class="divide-y divide-pink-100">

                @forelse($categories as $category)
                <tr class="hover:bg-pink-50 transition duration-300">

                    <!-- ID -->
                    <td class="px-6 py-3 text-pink-700 font-medium">
                        {{ $category->id }}
                    </td>

                    <!-- Nombre -->
                    <td class="px-6 py-3 font-semibold text-pink-900">
                        {{ $category->name }}
                    </td>

                    <!-- Descripción -->
                    <td class="px-6 py-3 text-pink-700">
                        {{ $category->description ?? '—' }}
                    </td>

                    <!-- Estado -->
                    <td class="px-6 py-3 text-center">
                        @if($category->status)
                            <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-medium">
                                Activo
                            </span>
                        @else
                            <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-xs font-medium">
                                Inactivo
                            </span>
                        @endif
                    </td>

                    <!-- Acciones -->
                    <td class="px-6 py-3 text-right space-x-2">

                        <a href="{{ route('service-categories.edit', $category->id) }}"
                       class="bg-pink-500 hover:bg-pink-600 text-white px-3 py-1 rounded-full text-xs font-medium transition shadow">
                            Editar
                        </a>

                        <form action="{{ route('service-categories.destroy', $category->id) }}"
                              method="POST"
                              class="inline"
                              onsubmit="return confirm('¿Eliminar categoría?')">
                            @csrf
                            @method('DELETE')

                            <button class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded-full text-xs shadow">
                                Eliminar
                            </button>
                        </form>

                    </td>

                </tr>

                @empty
                <tr>
                    <td colspan="5" class="text-center py-6 text-pink-400 font-medium">
                        No hay categorías registradas
                    </td>
                </tr>
                @endforelse

            </tbody>
        </table>
    </div>

    <!-- PAGINACIÓN -->
    <div class="mt-6">
        {{ $categories->links() }}
    </div>

</div>

@endsection