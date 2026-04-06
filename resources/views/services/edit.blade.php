@extends('layouts.admin')

@section('title','Editar Servicio')

@section('content')
<div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">

    {{-- Título --}}
    <h2 class="text-2xl font-bold text-pink-600 mb-6">EDITAR SERVICIO</h2>

    {{-- Errores --}}
    @if($errors->any())
        <div class="bg-pink-100 border border-pink-300 text-pink-700 p-4 rounded-2xl mb-6">
            <ul class="list-disc pl-5 space-y-1">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Formulario --}}
    <div class="bg-white p-6 shadow rounded-2xl">
        <form action="{{ route('services.update', $service->id) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            {{-- Categoría --}}
            <div>
                <label class="block mb-2 font-medium text-pink-600">Categoría *</label>
                <select name="category_id"
                        class="w-full border border-pink-300 rounded-2xl px-4 py-3 text-pink-700 focus:outline-none focus:ring focus:ring-pink-300">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" @selected(old('category_id', $service->category_id) == $category->id)>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Nombre --}}
            <div>
                <label class="block mb-2 font-medium text-pink-600">Nombre *</label>
                <input type="text" name="name" value="{{ old('name', $service->name) }}" required
                       class="w-full border border-pink-300 rounded-2xl px-4 py-3 text-pink-700 focus:outline-none focus:ring focus:ring-pink-300">
            </div>

            {{-- Descripción --}}
            <div>
                <label class="block mb-2 font-medium text-pink-600">Descripción</label>
                <textarea name="description" rows="3"
                          class="w-full border border-pink-300 rounded-2xl px-4 py-3 text-pink-700 focus:outline-none focus:ring focus:ring-pink-300">{{ old('description', $service->description) }}</textarea>
            </div>

            {{-- Precio --}}
            <div>
                <label class="block mb-2 font-medium text-pink-600">Precio</label>
                <input type="number" step="0.01" name="price" value="{{ old('price', $service->price) }}"
                       class="w-full border border-pink-300 rounded-2xl px-4 py-3 text-pink-700 focus:outline-none">
            </div>

            {{-- Duración --}}
            <div>
                <label class="block mb-2 font-medium text-pink-600">Duración (minutos) *</label>
                <input type="number" name="duration" value="{{ old('duration', $service->duration) }}" required
                       class="w-full border border-pink-300 rounded-2xl px-4 py-3 text-pink-700 focus:outline-none">
            </div>

            {{-- Estado --}}
            <div>
                <label class="block mb-2 font-medium text-pink-600">Estado *</label>
                <select name="status"
                        class="w-full border border-pink-300 rounded-2xl px-4 py-3 text-pink-700 focus:outline-none">
                    <option value="1" @selected(old('status', $service->status) == 1)>Activo</option>
                    <option value="0" @selected(old('status', $service->status) == 0)>Inactivo</option>
                </select>
            </div>

            {{-- Botones --}}
            <div class="flex justify-between">
                <a href="{{ route('services.index') }}"
                   class="bg-gray-200 hover:bg-gray-300 text-pink-600 font-semibold px-4 py-2 rounded-2xl shadow transition">
                    Volver
                </a>

                <button type="submit"
                        class="bg-pink-600 hover:bg-pink-700 text-white px-5 py-2 rounded-2xl shadow transition">
                    Guardar Cambios
                </button>
            </div>

        </form>
    </div>
</div>
@endsection