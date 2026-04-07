<div class="overflow-x-auto rounded-2xl shadow-xl border border-pink-200 bg-white">

<table class="w-full text-sm text-left">

<thead class="bg-gradient-to-r from-pink-500 to-pink-600 text-white text-xs">
<tr>
    <th class="px-6 py-3">ID</th>
    <th class="px-6 py-3">Nombre</th>
    <th class="px-6 py-3">Descripción</th>
    <th class="px-6 py-3">Módulos</th>
    <th class="px-6 py-3">Estado</th>
    <th class="px-6 py-3 text-right">Acciones</th>
</tr>
</thead>

<tbody class="divide-y divide-pink-100">

@forelse($roles as $role)
    @include('roles.partials._row', ['role' => $role])
@empty
<tr>
    <td colspan="6" class="text-center py-6 text-pink-400">
        No hay roles registrados
    </td>
</tr>
@endforelse

</tbody>
</table>

</div>