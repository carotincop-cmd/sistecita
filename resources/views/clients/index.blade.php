@extends('layouts.admin')

@section('title','Gestión de Clientes')

@section('content')

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

    <!-- TÍTULO -->
    <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between mb-6 gap-4">
        <h2 class="text-2xl font-bold mb-6 text-pink-600">✨ Lista de Clientes</h2>
    </div>
    <!-- filtros -->
<form method="GET" class="mb-4">

    <div class="flex flex-col sm:flex-row items-end gap-4">

        <!-- Buscar cliente -->
        <div class="w-56">
            <label class="text-pink-700 font-semibold text-sm">Buscar cliente</label>
            <input type="text"
                   name="search"
                   value="{{ request('search') }}"
                   placeholder="Ej: Juan Perez o 987654321"
                   class="w-full mt-1 h-[38px] p-2 rounded-lg border border-pink-300 bg-white 
                          text-pink-700 placeholder-pink-400 text-sm">
        </div>

        <!-- Botones -->
        <div class="flex gap-3 items-end">

            <button class="px-4 py-1.5 h-[38px] bg-pink-600 hover:bg-pink-700 text-white 
                           rounded-lg shadow text-sm transition flex items-center">
                Filtrar
            </button>

            <a href="{{ route('clients.index') }}"
               class="px-4 py-1.5 h-[38px] border border-pink-300
                      text-pink-700 rounded-lg shadow text-sm hover:bg-pink-50 transition flex items-center">
                Limpiar
            </a>

        </div>

    </div>

</form>
    <!-- TABLA -->
    <div class="overflow-x-auto rounded-2xl shadow-xl border border-pink-200 bg-white">

        <table class="w-full text-sm text-left border-collapse">

            <!-- HEADER ROSADO CON DEGRADADO -->
            <thead class="bg-gradient-to-r from-pink-500 to-pink-600 text-white uppercase text-xs tracking-wide shadow-md">
                <tr>
                    <th class="px-6 py-3">Nombre</th>
                    <th class="px-6 py-3">Teléfono</th>
                    <th class="px-6 py-3">Email</th>
                    <th class="px-6 py-3">Notas</th>
                </tr>
            </thead>

            <!-- FILAS -->
            <tbody class="divide-y divide-pink-100">

                @forelse($clients as $client)
                <tr class="hover:bg-pink-50 transition duration-300">

                    <!-- Nombre -->
                    <td class="px-6 py-3 font-medium text-pink-800">
                        {{ $client->first_name }} {{ $client->last_name }}
                    </td>

                    <!-- Teléfono -->
                    <td class="px-6 py-3 text-pink-600">
                        {{ $client->phone ?? '—' }}
                    </td>

                    <!-- Email -->
                    <td class="px-6 py-3 text-pink-600">
                        {{ $client->email ?? '—' }}
                    </td>

                    <!-- Notas -->
                    <td class="px-6 py-3 text-pink-600">
                        {{ $client->notes ? Str::limit($client->notes, 40) : '—' }}
                    </td>

                </tr>

                @empty
                <tr>
                    <td colspan="4" class="text-center py-6 text-pink-400 font-medium">
                        No hay clientes registrados
                    </td>
                </tr>
                @endforelse

            </tbody>
        </table>

    </div>

    <!-- PAGINACIÓN -->
    <div class="mt-6">
        {{ $clients->links() }}
    </div>

</div>

@endsection