@csrf

<input type="hidden" name="_method" x-bind:value="isEdit ? 'PUT' : 'POST'">

{{-- Nombre --}}
<div>
    <label class="block mb-2 font-medium text-pink-600">Nombre del rol</label>
    <input
        type="text"
        name="name"
        x-model="form.name"
        class="w-full border border-pink-300 rounded-2xl px-4 py-3 text-pink-700 focus:outline-none focus:ring focus:ring-pink-300" required>
    
</div>

{{-- Descripción --}}
<div>
    <label class="block mb-2 font-medium text-pink-600">Descripción</label>
    <input
        type="text"
        name="description"
        x-model="form.description"
        class="w-full border border-pink-300 rounded-2xl px-4 py-3 text-pink-700 focus:outline-none focus:ring focus:ring-pink-300">
</div>

{{-- Módulos --}}
<div>
    <label class="block mb-2 font-medium text-pink-600">Módulos Permitidos</label>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        @foreach ($modules as $module)
            <label 
                class="flex items-center gap-3 border border-pink-300 rounded-2xl px-4 py-3 cursor-pointer hover:bg-pink-50 transition">

                <!-- Checkbox -->
                <input
                    type="checkbox"
                    name="modules[]"
                    :value="{{ $module->id }}"
                    x-model="form.modules"
                    class="h-5 w-5 text-pink-600 border-pink-300 rounded focus:ring-pink-400"
                >

                <!-- Texto del módulo -->
                <span class="block mb-2 font-medium text-pink-600">
                    {{ $module->name }}
                </span>

            </label>
        @endforeach
    </div>
</div>

{{-- Estado --}}
<div>
    <label class="block mb-2 font-medium text-pink-600">Estado</label>
    <select
        name="status"
        x-model="form.status"
        class="w-full border border-pink-300 rounded-2xl px-4 py-3 text-pink-700 focus:outline-none focus:ring focus:ring-pink-300" required>
        <option value="1">Activo</option>
        <option value="0">Inactivo</option>
    </select>
</div>