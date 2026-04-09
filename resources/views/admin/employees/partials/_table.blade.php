<div class="overflow-x-auto rounded-2xl shadow-xl border border-pink-200 bg-white">

<table class="w-full text-sm text-left">

<thead class="bg-gradient-to-r from-pink-500 to-pink-600 text-white text-xs">
<tr>
    <th class="px-6 py-3">ID</th>
    <th class="px-6 py-3">Nombre</th>
    <th class="px-6 py-3">Teléfono</th>
    <th class="px-6 py-3">Especialidad</th>
    <th class="px-6 py-3">Rol</th>
    <th class="px-6 py-3">Horario</th>
    <th class="px-6 py-3">Días Libres</th>
    <th class="px-6 py-3">Estado</th>
    <th class="px-6 py-3 text-right">Acciones</th>
</tr>
</thead>

<tbody class="divide-y divide-pink-100">

@forelse($employees as $employee)
    @include('admin.employees.partials._row', ['employee' => $employee])
@empty
<tr>
    <td colspan="9" class="text-center py-6 text-pink-400">
        No hay empleados registrados
    </td>
</tr>
@endforelse

</tbody>
</table>

</div>