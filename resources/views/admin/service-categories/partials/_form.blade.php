{{-- service-categories/partials/_form.blade.php --}}
<div class="space-y-4">

    {{-- Nombre --}}
    <div>
        <label class="block mb-2 font-medium text-pink-600">Nombre *</label>
        <input type="text"
               name="name"
               x-model="form.name"
               required
               class="w-full border border-pink-300 rounded-2xl px-4 py-3 text-pink-700 focus:outline-none focus:ring focus:ring-pink-300">
    </div>

    {{-- Descripción --}}
    <div>
        <label class="block mb-2 font-medium text-pink-600">Descripción</label>
        <textarea name="description"
                  x-model="form.description"
                  rows="3"
                  class="w-full border border-pink-300 rounded-2xl px-4 py-3 text-pink-700 focus:outline-none focus:ring focus:ring-pink-300"></textarea>
    </div>

    {{-- Estado --}}
    <div>
        <label class="block mb-2 font-medium text-pink-600">Estado *</label>
        <select name="status"
                x-model="form.status"
                class="w-full border border-pink-300 rounded-2xl px-4 py-3 text-pink-700 focus:outline-none focus:ring focus:ring-pink-300">
            <option value="1">Activo</option>
            <option value="0">Inactivo</option>
        </select>
    </div>

</div>