<tr class="hover:bg-pink-50 transition">

    <td class="px-6 py-3 text-pink-700 font-medium">
        {{ $category->id }}
    </td>

    {{-- Imagen --}}
    <td class="px-6 py-3">
        @if($category->image)
            <img src="{{ asset('storage/' . $category->image) }}"
                 class="h-12 w-16 object-cover rounded-xl border border-pink-200">
        @else
            <span class="text-pink-300 text-xs">Sin imagen</span>
        @endif
    </td>

    <td class="px-6 py-3 font-semibold text-pink-900">
        {{ $category->name }}
    </td>

    <td class="px-6 py-3 text-pink-700">
        {{ $category->description ?? '—' }}
    </td>

    <td class="px-6 py-3 text-center">
        @if($category->status)
            <span class="px-3 py-1 text-xs rounded-full bg-green-100 text-green-700">
                Activo
            </span>
        @else
            <span class="px-3 py-1 text-xs rounded-full bg-red-100 text-red-700">
                Inactivo
            </span>
        @endif
    </td>

    <td class="px-6 py-3 text-right space-x-2">
        <button
            @click='openEdit(@json($category))'
            class="bg-pink-500 hover:bg-pink-600 text-white px-3 py-1 rounded-full text-xs">
            Editar
        </button>

        <form action="{{ route('service-categories.destroy', $category->id) }}"
              method="POST"
              class="inline"
              onsubmit="return confirm('¿Eliminar categoría?')">
            @csrf
            @method('DELETE')
            <button class="px-3 py-1 text-xs bg-red-500 hover:bg-red-600 text-white rounded-full">
                Eliminar
            </button>
        </form>
    </td>

</tr>