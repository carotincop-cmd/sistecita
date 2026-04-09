<tr class="hover:bg-pink-50 transition">

    <td class="px-6 py-3 text-pink-700 font-semibold">
        {{ $service->id }}
    </td>

    <td class="px-6 py-3 text-pink-800">
        {{ $service->category->name ?? '—' }}
    </td>

    <td class="px-6 py-3 font-medium text-pink-900">
        {{ $service->name }}
    </td>

    <td class="px-6 py-3 text-right text-pink-900">
        S/ {{ number_format($service->price, 2) }}
    </td>

    <td class="px-6 py-3 text-center text-pink-900">
        {{ $service->duration }} min
    </td>

    <td class="px-6 py-3 text-center">
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

    <td class="px-6 py-3 text-right flex justify-end gap-2">

        <button 
            @click='openEdit(@json($service))'
            class="bg-pink-500 hover:bg-pink-600 text-white px-3 py-1 rounded-full text-xs">
            Editar
        </button>

        <form action="{{ route('services.destroy', $service->id) }}"
              method="POST"
              onsubmit="return confirm('¿Eliminar servicio?')">
            @csrf
            @method('DELETE')

            <button class="px-3 py-1 text-xs bg-red-500 hover:bg-red-600 text-white rounded-full">
                Eliminar
            </button>
        </form>

    </td>

</tr>