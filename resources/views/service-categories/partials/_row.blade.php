<tr class="hover:bg-pink-50 transition">

    <td class="px-6 py-3 text-pink-700 font-medium">
        {{ $category->id }}
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

        <a href="{{ route('service-categories.edit', $category->id) }}"
           class="px-3 py-1 text-xs bg-pink-500 hover:bg-pink-600 text-white rounded-full">
            Editar
        </a>

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