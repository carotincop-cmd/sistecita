{{-- service-categories/partials/_form.blade.php --}}
<div class="space-y-3">

    {{-- Nombre + Estado --}}
    <div class="grid grid-cols-3 gap-3">
        <div class="col-span-2">
            <label class="text-sm font-medium text-pink-600">Nombre *</label>
            <input type="text" name="name" x-model="form.name" required
                   class="w-full border border-pink-300 rounded-xl px-3 py-2 text-pink-700 focus:outline-none focus:ring focus:ring-pink-300">
        </div>

        <div>
            <label class="text-sm font-medium text-pink-600">Estado *</label>
            <select name="status" x-model="form.status"
                    class="w-full border border-pink-300 rounded-xl px-3 py-2 text-pink-700 focus:outline-none focus:ring focus:ring-pink-300">
                <option value="1">Activo</option>
                <option value="0">Inactivo</option>
            </select>
        </div>
    </div>

    {{-- Imagen + Descripción --}}
    <div class="grid grid-cols-2 gap-3">

        {{-- IMAGEN --}}
        <div>
            <label class="text-sm font-medium text-pink-600">Imagen</label>

            {{-- Preview cuando editas (imagen ya guardada en BD) --}}
            <template x-if="isEdit && typeof form.image === 'string' && form.image">
                <div class="mb-2">
                    <img :src="`/storage/${form.image}`"
                         class="h-24 w-full object-cover rounded-xl border border-pink-200">
                </div>
            </template>

            {{-- Preview cuando seleccionas nueva imagen --}}
            <template x-if="form.image && typeof form.image !== 'string'">
                <div class="mb-2">
                    <img :src="URL.createObjectURL(form.image)"
                         class="h-24 w-full object-cover rounded-xl border border-pink-200">
                </div>
            </template>

            {{-- INPUT FILE CORREGIDO --}}
            <input type="file"
                   name="image"
                   accept="image/*"
                   @change="form.image = $event.target.files[0]"
                   class="w-full border border-pink-300 rounded-xl px-3 py-2 text-pink-700
                          file:bg-pink-500 file:text-white file:border-0
                          file:px-3 file:py-1 file:rounded-lg file:mr-2">

            <p class="text-xs text-pink-400 mt-1">JPG, PNG, WEBP — máx 2MB</p>
        </div>

        {{-- DESCRIPCIÓN --}}
        <div>
            <label class="text-sm font-medium text-pink-600">Descripción</label>
            <textarea name="description"
                      x-model="form.description"
                      rows="4"
                      class="w-full border border-pink-300 rounded-xl px-3 py-2 text-pink-700 focus:outline-none focus:ring focus:ring-pink-300"></textarea>
        </div>

    </div>

</div>