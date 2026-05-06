@csrf
<input type="hidden" name="_method" x-bind:value="editMode ? 'PUT' : 'POST'">

{{-- Título + Subtítulo + Posición + Estado --}}
<div class="grid grid-cols-4 gap-3">
    <div class="col-span-2">
        <label class="text-sm text-pink-700">Título</label>
        <input type="text" name="title" x-model="form.title"
               class="w-full border border-pink-200 rounded-xl px-3 py-2 bg-pink-50/40 text-pink-700 focus:ring-2 focus:ring-pink-500">
    </div>
    <div class="col-span-2">
        <label class="text-sm text-pink-700">Subtítulo</label>
        <input type="text" name="subtitle" x-model="form.subtitle"
               class="w-full border border-pink-200 rounded-xl px-3 py-2 bg-pink-50/40 text-pink-700 focus:ring-2 focus:ring-pink-500">
    </div>
</div>

{{-- Texto Botón + Link Botón + Posición + Estado --}}
<div class="grid grid-cols-4 gap-3">
    <div>
        <label class="text-sm text-pink-700">Texto Botón</label>
        <input type="text" name="button_text" x-model="form.button_text"
               class="w-full border border-pink-200 rounded-xl px-3 py-2 bg-pink-50/40 text-pink-700 focus:ring-2 focus:ring-pink-500">
    </div>
    <div>
        <label class="text-sm text-pink-700">Link Botón</label>
        <input type="text" name="button_link" x-model="form.button_link"
               class="w-full border border-pink-200 rounded-xl px-3 py-2 bg-pink-50/40 text-pink-700 focus:ring-2 focus:ring-pink-500">
    </div>
    <div>
        <label class="text-sm text-pink-700">Posición</label>
        <input type="number" name="position" min="0" x-model="form.position"
               class="w-full border border-pink-200 rounded-xl px-3 py-2 bg-pink-50/40 text-pink-700 focus:ring-2 focus:ring-pink-500">
    </div>
    <div>
        <label class="text-sm text-pink-700">Estado</label>
        <select name="status" x-model="form.status"
                class="w-full border border-pink-200 rounded-xl px-3 py-2 bg-pink-50/40 text-pink-700 focus:ring-2 focus:ring-pink-500">
            <option value="1">Activo</option>
            <option value="0">Inactivo</option>
        </select>
    </div>
</div>

{{-- Imagen + Descripción --}}
<div class="grid grid-cols-2 gap-3">
    <div>
        <label class="text-sm text-pink-700">Imagen</label>
        <input type="file" name="image"
               class="w-full border border-pink-200 rounded-xl px-3 py-2 bg-pink-50/40 text-pink-700 file:bg-pink-500 file:text-white file:border-0 file:px-3 file:py-1 file:rounded-lg">
    </div>
    <div>
        <label class="text-sm text-pink-700">Descripción</label>
        <textarea name="description" x-model="form.description" rows="2"
                  class="w-full border border-pink-200 rounded-xl px-3 py-2 bg-pink-50/40 text-pink-700 focus:ring-2 focus:ring-pink-500"></textarea>
    </div>
</div>