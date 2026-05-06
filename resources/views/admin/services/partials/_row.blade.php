<tr class="hover:bg-pink-50 transition align-middle">

    {{-- ID --}}
    <td class="px-6 py-4 text-gray-700 font-medium">
        {{ $service->id }}
    </td>

    {{-- Servicio (Imagen + Nombre) --}}
    <td class="px-6 py-4">
        <div class="flex items-center gap-4">

            <img
                src="{{ $service->image
                    ? asset('storage/'.$service->image)
                    : asset('images/default-service.png') }}"
                class="w-14 h-14 object-cover rounded-xl border border-pink-200 shadow-sm">

            <div>
                <p class="font-semibold text-gray-800">
                    {{ $service->name }}
                </p>

                <p class="text-xs text-gray-400">
                    Servicio disponible
                </p>
            </div>

        </div>
    </td>

    {{-- Categoría --}}
    <td class="px-6 py-4 text-gray-700">
        {{ $service->category->name ?? '—' }}
    </td>

    {{-- Precio --}}
    <td class="px-6 py-4 text-right text-pink-600 font-bold">
        S/ {{ number_format($service->price, 2) }}
    </td>

    {{-- Duración --}}
    <td class="px-6 py-4 text-center text-gray-700">
        {{ $service->duration }} min
    </td>

    {{-- Estado --}}
    <td class="px-6 py-4 text-center">
        @if($service->status)
            <span class="px-3 py-1 text-xs rounded-full bg-green-100 text-green-700">
                Activo
            </span>
        @else
            <span class="px-3 py-1 text-xs rounded-full bg-red-100 text-red-700">
                Inactivo
            </span>
        @endif
    </td>

    {{-- Acciones --}}
    <td class="px-6 py-4 text-right">
        <div class="flex justify-end gap-2">

            <button
                type="button"
                @click='openEdit(@json($service))'
                class="bg-pink-500 hover:bg-pink-600 text-white px-3 py-1 rounded-full text-xs transition">
                Editar
            </button>

            <form action="{{ route('services.destroy', $service->id) }}"
                  method="POST"
                  onsubmit="return confirm('¿Eliminar servicio?')">
                @csrf
                @method('DELETE')

                <button
                    type="submit"
                    class="px-3 py-1 text-xs bg-red-500 hover:bg-red-600 text-white rounded-full transition">
                    Eliminar
                </button>
            </form>

        </div>
    </td>

</tr>