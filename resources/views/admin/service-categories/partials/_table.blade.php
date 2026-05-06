<div class="bg-white rounded-2xl shadow border border-pink-200 overflow-hidden">

    <table class="w-full text-sm">

        <thead class="bg-gradient-to-r from-pink-500 to-pink-600 text-white text-xs uppercase">
            <tr>
                <th class="px-6 py-3 text-left">ID</th>
                <th class="px-6 py-3">Imagen</th>
                <th class="px-6 py-3 text-left">Nombre</th>
                <th class="px-6 py-3 text-left">Descripción</th>
                <th class="px-6 py-3 text-center">Estado</th>
                <th class="px-6 py-3 text-right">Acciones</th>
            </tr>
        </thead>

        <tbody class="divide-y divide-pink-100">
            @forelse($categories as $category)
                @include('admin.service-categories.partials._row', ['category' => $category])
            @empty
                <tr>
                    <td colspan="5" class="text-center py-6 text-pink-400">
                        No hay categorías registradas
                    </td>
                </tr>
            @endforelse
        </tbody>

    </table>

</div>