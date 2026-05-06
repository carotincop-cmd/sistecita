@csrf
<input type="hidden" name="_method" x-bind:value="isEdit ? 'PUT' : 'POST'">

{{-- Nombre + Estado en una fila --}}
<div class="grid grid-cols-2 gap-3">
    <div>
        <label class="block mb-1 text-sm font-medium text-pink-600">Nombre del rol</label>
        <input type="text" name="name" x-model="form.name" required
               class="w-full border border-pink-300 rounded-2xl px-4 py-2 text-pink-700 focus:outline-none focus:ring focus:ring-pink-300">
    </div>
    <div>
        <label class="block mb-1 text-sm font-medium text-pink-600">Estado</label>
        <select name="status" x-model="form.status" required
                class="w-full border border-pink-300 rounded-2xl px-4 py-2 text-pink-700 focus:outline-none focus:ring focus:ring-pink-300">
            <option value="1">Activo</option>
            <option value="0">Inactivo</option>
        </select>
    </div>
</div>

{{-- Descripción --}}
<div>
    <label class="block mb-1 text-sm font-medium text-pink-600">Descripción</label>
    <input type="text" name="description" x-model="form.description"
           class="w-full border border-pink-300 rounded-2xl px-4 py-2 text-pink-700 focus:outline-none focus:ring focus:ring-pink-300">
</div>

{{-- Módulos --}}
<div>
    <label class="block mb-2 text-sm font-medium text-pink-600">Módulos Permitidos</label>
    <div class="grid grid-cols-2 md:grid-cols-3 gap-2">
        @foreach ($modules as $module)
            <label class="flex items-center gap-2 border border-pink-200 rounded-xl px-3 py-2 cursor-pointer hover:bg-pink-50 transition">
                <input type="checkbox" name="modules[]"
                       :value="{{ $module->id }}"
                       x-model="form.modules"
                       class="h-4 w-4 text-pink-600 border-pink-300 rounded focus:ring-pink-400">
                <span class="text-sm font-medium text-pink-600">{{ $module->name }}</span>
            </label>
        @endforeach
    </div>
</div>