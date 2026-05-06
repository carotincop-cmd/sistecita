@csrf
<input type="hidden" name="_method" x-bind:value="isEdit ? 'PUT' : 'POST'">

{{-- Categoría + Nombre --}}
<div class="grid grid-cols-2 gap-3">
    <div>
        <label class="text-sm font-medium text-pink-600">Categoría *</label>
        <select name="category_id" x-model="form.category_id"
                class="w-full border border-pink-300 rounded-xl px-3 py-2 text-pink-700 focus:outline-none focus:ring focus:ring-pink-300">
            <option value="">Seleccione</option>
            <template x-for="cat in categories" :key="cat.id">
                <option :value="cat.id" x-text="cat.name"></option>
            </template>
        </select>
    </div>

    <div>
        <label class="text-sm font-medium text-pink-600">Nombre *</label>
        <input type="text" name="name" x-model="form.name" required
               class="w-full border border-pink-300 rounded-xl px-3 py-2 text-pink-700 focus:outline-none focus:ring focus:ring-pink-300">
    </div>
</div>

{{-- Precio + Duración + Estado --}}
<div class="grid grid-cols-3 gap-3">
    <div>
        <label class="text-sm font-medium text-pink-600">Precio</label>
        <input type="number" step="0.01" name="price" x-model="form.price"
               class="w-full border border-pink-300 rounded-xl px-3 py-2 text-pink-700 focus:outline-none focus:ring focus:ring-pink-300">
    </div>

    <div>
        <label class="text-sm font-medium text-pink-600">Duración (min) *</label>
        <input type="number" name="duration" x-model="form.duration" required
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

{{-- Imagen --}}
<div>
    <label class="text-sm font-medium text-pink-600">Imagen del servicio</label>

    <input type="file"
           name="image"
           accept="image/*"
           class="w-full border border-pink-300 rounded-xl px-3 py-2 text-pink-700 file:mr-3 file:px-3 file:py-1 file:border-0 file:rounded-lg file:bg-pink-100 file:text-pink-700">

    {{-- Vista previa al editar --}}
    <template x-if="form.image_url">
        <div class="mt-3">
            <img :src="form.image_url"
                 class="w-24 h-24 object-cover rounded-xl border border-pink-200 shadow-sm">
        </div>
    </template>

    <p class="text-xs text-gray-500 mt-1">
        JPG, PNG o WEBP (máx. 2MB)
    </p>
</div>

{{-- Descripción --}}
<div>
    <label class="text-sm font-medium text-pink-600">Descripción</label>
    <textarea name="description" x-model="form.description" rows="2"
              class="w-full border border-pink-300 rounded-xl px-3 py-2 text-pink-700 focus:outline-none focus:ring focus:ring-pink-300"></textarea>
</div>