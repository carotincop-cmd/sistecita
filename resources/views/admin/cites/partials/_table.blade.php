<div class="overflow-x-auto rounded-2xl shadow-xl border border-pink-200 bg-white">

<table class="w-full text-sm text-left">

<thead class="bg-gradient-to-r from-pink-500 to-pink-600 text-white text-xs">
<tr>
    <th class="px-6 py-3">ID</th>
    <th class="px-6 py-3">Cliente</th>
    <th class="px-6 py-3">Empleado</th>
    <th class="px-6 py-3">Servicio</th>
    <th class="px-6 py-3">Precio</th>
    <th class="px-6 py-3">Fecha</th>
    <th class="px-6 py-3">Horario</th>
    <th class="px-6 py-3">Estado</th>
    <th class="px-6 py-3 text-right">Acciones</th>
</tr>
</thead>

<tbody class="divide-y divide-pink-100">

@forelse($cites as $cite)
    @include('admin.cites.partials._row', ['cite' => $cite])
@empty
<tr>
    <td colspan="9" class="text-center py-6 text-pink-400">
        No hay citas registradas
    </td>
</tr>
@endforelse

</tbody>
</table>

</div>