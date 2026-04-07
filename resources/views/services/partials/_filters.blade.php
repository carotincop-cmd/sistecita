<form method="GET" class="mb-6">
    <div class="flex flex-wrap items-end gap-4">

        <!-- Buscar -->
        <div class="w-56">
            <label class="text-sm font-semibold text-pink-700">Buscar servicio</label>
            <input type="text"
                   name="search"
                   value="{{ request('search') }}"
                   placeholder="Ingrese Nombre"
                   class="w-full mt-1 h-[38px] px-3 rounded-lg border border-pink-300 text-pink-700 text-sm">
        </div>

        <!-- Categoría -->
        <div class="w-40">
            <label class="text-sm font-semibold text-pink-700">Categoría</label>
            <select name="category_id"
                    class="w-full mt-1 h-[38px] px-2 rounded-lg border border-pink-300 text-pink-700 text-sm">
                <option value="">Todas</option>
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}"
                        {{ request('category_id') == $cat->id ? 'selected' : '' }}>
                        {{ $cat->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Estado -->
        <div class="w-28">
            <label class="text-sm font-semibold text-pink-700">Estado</label>
            <select name="status"
                    class="w-full mt-1 h-[38px] px-2 rounded-lg border border-pink-300 text-pink-700 text-sm">
                <option value="">Todos</option>
                <option value="1" {{ request('status') === '1' ? 'selected' : '' }}>Activo</option>
                <option value="0" {{ request('status') === '0' ? 'selected' : '' }}>Inactivo</option>
            </select>
        </div>

        <!-- Botones -->
        <div class="flex gap-2">
            <button class="h-[38px] px-4 bg-pink-600 text-white rounded-lg">
                Filtrar
            </button>

            <a href="{{ route('services.index') }}"
               class="px-4 py-1.5 h-[38px] border border-pink-300 text-pink-700 rounded-lg">
                Limpiar
            </a>
        </div>

    </div>
</form>