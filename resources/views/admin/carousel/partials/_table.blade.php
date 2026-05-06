<div class="overflow-x-auto rounded-2xl shadow-xl border border-pink-200 bg-white">

    <table class="w-full text-sm text-left">

        <thead class="bg-gradient-to-r from-pink-500 to-pink-600 text-white text-xs">
            <tr>
                <th class="px-6 py-3">ID</th>
                <th class="px-6 py-3">Imagen</th>
                <th class="px-6 py-3">Título</th>
                <th class="px-6 py-3">Subtítulo</th>
                <th class="px-6 py-3">Posición</th>
                <th class="px-6 py-3">Estado</th>
                <th class="px-6 py-3 text-right">Acciones</th>
            </tr>
        </thead>

        <tbody class="divide-y divide-pink-100">

            @forelse($slides as $slide)

            <tr class="hover:bg-pink-50 transition">

                <td class="px-6 py-4 font-semibold text-pink-700">
                    #{{ $slide->id }}
                </td>

                <td class="px-6 py-4">
                    <img src="{{ asset('storage/' . $slide->image) }}"
                         class="w-20 h-12 rounded-xl object-cover border border-pink-200">
                </td>

                <td class="px-6 py-4 font-medium text-gray-700">
                    {{ $slide->title ?: '---' }}
                </td>

                <td class="px-6 py-4 text-gray-500">
                    {{ $slide->subtitle ?: '---' }}
                </td>

                <td class="px-6 py-4 text-pink-700 font-semibold">
                    {{ $slide->position }}
                </td>

                <td class="px-6 py-4">

                    @if($slide->status)
                        <span class="px-3 py-1 rounded-full text-xs bg-green-100 text-green-700 font-semibold">
                            Activo
                        </span>
                    @else
                        <span class="px-3 py-1 rounded-full text-xs bg-red-100 text-red-700 font-semibold">
                            Inactivo
                        </span>
                    @endif

                </td>

                <td class="px-6 py-4">
                    <div class="flex justify-end gap-2">

                        <button
                            @click="editSlide({
                                id: '{{ $slide->id }}',
                                title: '{{ $slide->title }}',
                                subtitle: '{{ $slide->subtitle }}',
                                description: `{{ $slide->description }}`,
                                button_text: '{{ $slide->button_text }}',
                                button_link: '{{ $slide->button_link }}',
                                position: '{{ $slide->position }}',
                                status: {{ $slide->status ? 'true' : 'false' }}
                            })"
                            class="bg-pink-500 hover:bg-pink-600 text-white px-3 py-1 rounded-full text-xs">
                            Editar
                        </button>

                        <form action="{{ route('carousel.destroy', $slide->id) }}"
                              method="POST"
                              onsubmit="return confirm('¿Eliminar slide?')">

                            @csrf
                            @method('DELETE')

                            <button
                                class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded-full text-xs">
                                Eliminar
                            </button>

                        </form>

                    </div>
                </td>

            </tr>

            @empty

            <tr>
                <td colspan="7" class="text-center py-6 text-pink-400">
                    No hay slides registrados
                </td>
            </tr>

            @endforelse

        </tbody>

    </table>

</div>