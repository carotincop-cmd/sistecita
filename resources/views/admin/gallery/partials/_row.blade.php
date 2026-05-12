<tr class="transition hover:bg-pink-50">

    <!-- ID -->
    <td class="px-6 py-3 font-semibold text-pink-700">
        {{ $gallery->id }}
    </td>

    <!-- Imagen -->
    <td class="px-6 py-3">

        @if($gallery->image)

            <img
                src="{{ asset('storage/' . $gallery->image) }}"
                alt="{{ $gallery->title }}"
                class="h-16 w-16 rounded-2xl border border-pink-100 object-cover shadow-sm"
            >

        @else

            <div
                class="flex h-16 w-16 items-center justify-center rounded-2xl bg-pink-100 text-2xl"
            >
                💅
            </div>

        @endif

    </td>

    <!-- Título -->
    <td class="px-6 py-3">

        <div class="font-medium text-pink-800">
            {{ $gallery->title }}
        </div>

        <div class="mt-1 max-w-[220px] truncate text-xs text-pink-400">

            {{ $gallery->description ?: 'Sin descripción' }}

        </div>

    </td>

    <!-- Servicio -->
    <td class="px-6 py-3">

        <span
            class="rounded-full bg-pink-100 px-3 py-1 text-xs text-pink-700"
        >
            {{ $gallery->service->name ?? '—' }}
        </span>

    </td>

    <!-- Categoría -->
    <td class="px-6 py-3 text-pink-600">

        {{ $gallery->service->category->name ?? '—' }}

    </td>

    <!-- Estado -->
    <td class="px-6 py-3">

        @if($gallery->status)

            <span
                class="rounded-full bg-green-100 px-3 py-1 text-xs text-green-700"
            >
                Activo
            </span>

        @else

            <span
                class="rounded-full bg-red-100 px-3 py-1 text-xs text-red-700"
            >
                Inactivo
            </span>

        @endif

    </td>

    <!-- Actions -->
    <td class="flex justify-end gap-2 px-6 py-3 text-right">

        <!-- Edit -->
        <button
            @click='openEdit(@json($gallery))'
            class="rounded-full bg-pink-500 px-3 py-1 text-xs text-white transition hover:bg-pink-600"
        >
            Editar
        </button>

        <!-- Delete -->
        <form
            action="{{ route('gallery.destroy', $gallery->id) }}"
            method="POST"
            onsubmit="return confirm('¿Eliminar este trabajo?')"
        >

            @csrf
            @method('DELETE')

            <button
                class="rounded-full bg-red-500 px-3 py-1 text-xs text-white transition hover:bg-red-600"
            >
                Eliminar
            </button>

        </form>

    </td>

</tr>