<div class="overflow-x-auto rounded-2xl border border-pink-200 bg-white shadow-xl">

    <table class="w-full text-left text-sm">

        <!-- Header -->
        <thead
            class="bg-gradient-to-r from-pink-500 to-pink-600 text-xs text-white"
        >

            <tr>

                <th class="px-6 py-3">
                    ID
                </th>

                <th class="px-6 py-3">
                    Imagen
                </th>

                <th class="px-6 py-3">
                    Título
                </th>

                <th class="px-6 py-3">
                    Servicio
                </th>

                <th class="px-6 py-3">
                    Categoría
                </th>

                <th class="px-6 py-3">
                    Estado
                </th>

                <th class="px-6 py-3 text-right">
                    Acciones
                </th>

            </tr>

        </thead>

        <!-- Body -->
        <tbody class="divide-y divide-pink-100">

            @forelse($galleries as $gallery)

                @include('admin.gallery.partials._row', [
                    'gallery' => $gallery
                ])

            @empty

                <tr>

                    <td
                        colspan="7"
                        class="py-8 text-center text-pink-400"
                    >
                        No hay trabajos registrados
                    </td>

                </tr>

            @endforelse

        </tbody>

    </table>

</div>