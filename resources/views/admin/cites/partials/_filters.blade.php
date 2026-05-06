<form method="GET" class="mb-4">

    <div class="flex flex-col sm:flex-row items-end gap-4">

        <!-- Buscar cliente o empleado -->
        <div class="w-56">
            <label class="text-pink-700 font-semibold text-sm">Buscar</label>
            <input type="text" name="search" value="{{ request('search') }}"
                  placeholder="Cliente o empleado"
                  class="w-full mt-1 h-[38px] p-2 rounded-lg border border-pink-300 bg-white 
                          text-pink-700 placeholder-pink-400 text-sm">
        </div>

        <!-- Servicio -->
        <div class="w-48">
            <label class="text-pink-700 font-semibold text-sm">Servicio</label>
            <select name="service_id"
                    class="w-full mt-1 h-[38px] p-2 rounded-lg border border-pink-300 bg-white text-pink-700 text-sm">
                <option value="">Todos</option>
                @foreach($services as $service)
                    <option value="{{ $service->id }}" 
                        {{ request('service_id') == $service->id ? 'selected' : '' }}>
                        {{ $service->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Estado -->
        <div class="w-40">
            <label class="text-pink-700 font-semibold text-sm">Estado</label>
            <select name="status"
                    class="w-full mt-1 h-[38px] p-2 rounded-lg border border-pink-300 bg-white text-pink-700 text-sm">
                <option value="">Todos</option>
                <option value="pending" {{ request('status') === 'pending' ? 'selected' : '' }}>Pendiente</option>
                <option value="confirmed" {{ request('status') === 'confirmed' ? 'selected' : '' }}>Confirmada</option>
                <option value="completed" {{ request('status') === 'completed' ? 'selected' : '' }}>Completada</option>
                <option value="cancelled" {{ request('status') === 'cancelled' ? 'selected' : '' }}>Cancelada</option>
            </select>
        </div>

        <!-- Botones -->
        <div class="flex gap-3 items-end">
            <button class="px-4 py-1.5 h-[38px] bg-pink-600 text-white rounded-lg">
                Filtrar
            </button>

            <a href="{{ route('cites.index') }}"
               class="px-4 py-1.5 h-[38px] border border-pink-300 text-pink-700 rounded-lg">
                Limpiar
            </a>
        </div>

    </div>

</form>