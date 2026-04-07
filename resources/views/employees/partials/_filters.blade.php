<form method="GET" class="mb-4">

    <div class="flex flex-col sm:flex-row items-end gap-4">

        <div class="w-56">
            <label class="text-pink-700 font-semibold text-sm">Buscar empleado</label>
            <input type="text" name="search" value="{{ request('search') }}"
                  placeholder="Ingrese Nombre"
                  class="w-full mt-1 h-[38px] p-2 rounded-lg border border-pink-300 bg-white 
                          text-pink-700 placeholder-pink-400 text-sm">
        </div>

        <div class="w-28">
            <label class="text-pink-700 font-semibold text-sm">Estado</label>
            <select name="status"
                    class="w-full mt-1 h-[38px] p-2 rounded-lg border border-pink-300 bg-white text-pink-700 text-sm">
                <option value="">Todos</option>
                <option value="1" {{ request('status') === '1' ? 'selected' : '' }}>Activo</option>
                <option value="0" {{ request('status') === '0' ? 'selected' : '' }}>Inactivo</option>
            </select>
        </div>

        <div class="flex gap-3 items-end">
            <button class="px-4 py-1.5 h-[38px] bg-pink-600 text-white rounded-lg">
                Filtrar
            </button>

            <a href="{{ route('employees.index') }}"
               class="px-4 py-1.5 h-[38px] border border-pink-300 text-pink-700 rounded-lg">
                Limpiar
            </a>
        </div>

    </div>

</form>