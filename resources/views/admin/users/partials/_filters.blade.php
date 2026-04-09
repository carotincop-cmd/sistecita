<form method="GET" class="mb-4">

    <div class="flex flex-col sm:flex-row items-end gap-4">

        <!-- Buscar -->
        <div class="w-56">
            <label class="text-pink-700 font-semibold text-sm">Buscar nombre</label>
            <input type="text" name="search" value="{{ request('search') }}"
            placeholder="Ingrese Nombre"
                   class="w-full mt-1 h-[38px] p-2 rounded-lg border border-pink-300 bg-white 
                          text-pink-700 placeholder-pink-400 text-sm">
        </div>

        <!-- Rol -->
        <div class="w-40">
            <label class="text-pink-700 font-semibold text-sm">Rol</label>
            <select name="role_id"
                class="w-full mt-1 h-[38px] p-2 rounded-lg border border-pink-300 bg-white text-pink-700 text-sm">

                <option value="">Todos</option>
                @foreach($roles as $role)
                    <option value="{{ $role->id }}"
                        {{ request('role_id') == $role->id ? 'selected' : '' }}>
                        {{ $role->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Estado -->
        <div class="w-28">
            <label class="text-pink-700 font-semibold text-sm">Estado</label>
            <select name="status"
                class="w-full mt-1 h-[38px] p-2 rounded-lg border border-pink-300 bg-white text-pink-700 text-sm">

                <option value="">Todos</option>
                <option value="1" {{ request('status') === '1' ? 'selected' : '' }}>Activo</option>
                <option value="0" {{ request('status') === '0' ? 'selected' : '' }}>Inactivo</option>
            </select>
        </div>

        <!-- Botones -->
        <div class="flex gap-3 items-end">
            <button class="px-4 py-1.5 h-[38px] bg-pink-600 text-white rounded-lg">
                Filtrar
            </button>

            <a href="{{ route('users.index') }}"
               class="px-4 py-1.5 h-[38px] border border-pink-300 text-pink-700 rounded-lg">
                Limpiar
            </a>
        </div>

    </div>

</form>