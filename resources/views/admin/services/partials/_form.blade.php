{{-- services/partials/_form.blade.php --}}
<div class="space-y-4">

    {{-- Categoría --}}
    <div>
        <label class="block mb-2 font-medium text-pink-600">Categoría *</label>
        <select name="category_id" x-model="form.category_id"
                class="w-full border border-pink-300 rounded-2xl px-4 py-3 text-pink-700 focus:outline-none focus:ring focus:ring-pink-300">
            <option value="">Seleccione</option>
            <template x-for="cat in categories" :key="cat.id">
                <option :value="cat.id" x-text="cat.name"></option>
            </template>
        </select>
    </div>

    {{-- Nombre --}}
    <div>
        <label class="block mb-2 font-medium text-pink-600">Nombre *</label>
        <input type="text" name="name" x-model="form.name" required
               class="w-full border border-pink-300 rounded-2xl px-4 py-3 text-pink-700 focus:outline-none focus:ring focus:ring-pink-300">
    </div>

    {{-- Descripción --}}
    <div>
        <label class="block mb-2 font-medium text-pink-600">Descripción</label>
        <textarea name="description" x-model="form.description" rows="3"
                  class="w-full border border-pink-300 rounded-2xl px-4 py-3 text-pink-700 focus:outline-none focus:ring focus:ring-pink-300"></textarea>
    </div>

    {{-- Precio --}}
    <div>
        <label class="block mb-2 font-medium text-pink-600">Precio</label>
        <input type="number" step="0.01" name="price" x-model="form.price"
               class="w-full border border-pink-300 rounded-2xl px-4 py-3 text-pink-700 focus:outline-none">
    </div>

    {{-- Duración --}}
    <div>
        <label class="block mb-2 font-medium text-pink-600">Duración (minutos) *</label>
        <input type="number" name="duration" x-model="form.duration" required
               class="w-full border border-pink-300 rounded-2xl px-4 py-3 text-pink-700 focus:outline-none">
    </div>

    {{-- Estado --}}
    <div>
        <label class="block mb-2 font-medium text-pink-600">Estado *</label>
        <select name="status" x-model="form.status"
                class="w-full border border-pink-300 rounded-2xl px-4 py-3 text-pink-700">
            <option value="1">Activo</option>
            <option value="0">Inactivo</option>
        </select>
    </div>

</div>