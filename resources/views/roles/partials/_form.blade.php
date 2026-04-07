@csrf

<input type="hidden" name="_method" x-bind:value="isEdit ? 'PUT' : 'POST'">

{{-- Nombre --}}
<div>
    <label class="block mb-2 font-semibold text-pink-700 dark:text-pink-300">Nombre del rol</label>
    <input
        type="text"
        name="name"
        x-model="form.name"
        class="w-full border border-pink-200 rounded-2xl px-4 py-3 focus:ring-2 focus:ring-pink-500 bg-pink-50/40 dark:bg-slate-800 dark:border-slate-700"
        required
    >
</div>

{{-- Descripción --}}
<div>
    <label class="block mb-2 font-semibold text-pink-700 dark:text-pink-300">Descripción</label>
    <input
        type="text"
        name="description"
        x-model="form.description"
        class="w-full border border-pink-200 rounded-2xl px-4 py-3 focus:ring-2 focus:ring-pink-500 bg-pink-50/40 dark:bg-slate-800 dark:border-slate-700"
    >
</div>

{{-- Módulos --}}
<div>
    <label class="block mb-3 font-semibold text-pink-700 dark:text-pink-300">Módulos Permitidos</label>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        @foreach ($modules as $module)
            <label class="flex items-center gap-3 border border-pink-200 rounded-2xl p-4 
                         bg-white hover:bg-pink-50 cursor-pointer transition shadow-sm
                         dark:bg-slate-800 dark:border-slate-700">
                
                <input
                    type="checkbox"
                    name="modules[]"
                    :value="{{ $module->id }}"
                    x-model="form.modules"
                    class="w-5 h-5 text-pink-600 rounded focus:ring-pink-500"
                >

                <span class="font-medium text-pink-700 dark:text-pink-300">
                    {{ $module->name }}
                </span>
            </label>
        @endforeach
    </div>
</div>

{{-- Estado --}}
<div>
    <label class="block mb-2 font-semibold text-pink-700 dark:text-pink-300">Estado</label>
    <select
        name="status"
        x-model="form.status"
        class="w-full border border-pink-200 rounded-2xl px-4 py-3 focus:ring-2 focus:ring-pink-500 bg-pink-50/40 text-pink-700 dark:bg-slate-800 dark:border-slate-700 dark:text-white"
        required
    >
        <option value="1">Activo</option>
        <option value="0">Inactivo</option>
    </select>
</div>