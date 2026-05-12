<form method="GET" class="mb-6">

    <div class="flex flex-col gap-4 lg:flex-row lg:items-end">

        <!-- Buscar -->
        <div class="w-full lg:w-64">
            <label class="text-sm font-semibold text-pink-700">
                Buscar trabajo
            </label>

            <input
                type="text"
                name="search"
                value="{{ request('search') }}"
                placeholder="Ingrese título"
                class="mt-1 h-[42px] w-full rounded-xl border border-pink-300 bg-white px-3 text-sm text-pink-700 placeholder-pink-400 focus:border-pink-500 focus:outline-none focus:ring-2 focus:ring-pink-200"
            >
        </div>

        <!-- Servicio -->
        <div class="w-full lg:w-60">
            <label class="text-sm font-semibold text-pink-700">
                Servicio
            </label>

            <select
                name="service_id"
                class="mt-1 h-[42px] w-full rounded-xl border border-pink-300 bg-white px-3 text-sm text-pink-700 focus:border-pink-500 focus:outline-none focus:ring-2 focus:ring-pink-200"
            >

                <option value="">
                    Todos
                </option>

                @foreach($services as $service)

                    <option
                        value="{{ $service->id }}"
                        {{ request('service_id') == $service->id ? 'selected' : '' }}
                    >
                        {{ $service->name }}
                    </option>

                @endforeach

            </select>
        </div>

        <!-- Estado -->
        <div class="w-full lg:w-36">
            <label class="text-sm font-semibold text-pink-700">
                Estado
            </label>

            <select
                name="status"
                class="mt-1 h-[42px] w-full rounded-xl border border-pink-300 bg-white px-3 text-sm text-pink-700 focus:border-pink-500 focus:outline-none focus:ring-2 focus:ring-pink-200"
            >

                <option value="">
                    Todos
                </option>

                <option
                    value="1"
                    {{ request('status') === '1' ? 'selected' : '' }}
                >
                    Activo
                </option>

                <option
                    value="0"
                    {{ request('status') === '0' ? 'selected' : '' }}
                >
                    Inactivo
                </option>

            </select>
        </div>

        <!-- Buttons -->
        <div class="flex gap-3">

            <button
                type="submit"
                class="h-[42px] rounded-xl bg-pink-600 px-5 text-sm font-semibold text-white transition hover:bg-pink-700"
            >
                Filtrar
            </button>

            <a
                href="{{ route('gallery.index') }}"
                class="flex h-[42px] items-center rounded-xl border border-pink-300 px-5 text-sm font-semibold text-pink-700 transition hover:bg-pink-50"
            >
                Limpiar
            </a>

        </div>

    </div>

</form>