<tr class="hover:bg-pink-50 transition">

<td class="px-6 py-3 text-pink-700 font-semibold">
    {{ $cite->id }}
</td>

<td class="px-6 py-3 text-pink-800 font-medium">
    {{ $cite->client?->first_name }} {{ $cite->client?->last_name ?? '—' }}
</td>

<td class="px-6 py-3 text-pink-600">
    {{ $cite->employee->first_name }} {{ $cite->employee->last_name }}
</td>

<td class="px-6 py-3 text-pink-600">
    {{ $cite->service->name ?? '—' }}
</td>

<td class="px-6 py-3 text-pink-600 font-semibold">
    S/ {{ $cite->service?->price ?? '0.00' }}
</td>

<td class="px-6 py-3 text-pink-600">
    {{ $cite->date }}
</td>

<td class="px-6 py-3 text-pink-600">
    {{ \Carbon\Carbon::parse($cite->start_time)->format('H:i') }} - 
    {{ \Carbon\Carbon::parse($cite->end_time)->format('H:i') }}
</td>

<td class="px-6 py-3">
    @switch($cite->status)
        @case('pending')
            <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-xs">Pendiente</span>
            @break
        @case('confirmed')
            <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-xs">Confirmada</span>
            @break
        @case('completed')
            <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs">Completada</span>
            @break
        @case('cancelled')
            <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-xs">Cancelada</span>
            @break
    @endswitch
</td>

<td class="px-6 py-3 text-right flex justify-end gap-2">

    <button 
        @click='openEdit(@json($cite))'
        class="bg-pink-500 hover:bg-pink-600 text-white px-3 py-1 rounded-full text-xs">
        Editar
    </button>

    <form action="{{ route('cites.destroy', $cite->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded-full text-xs">
            Eliminar
        </button>
    </form>

</td>

</tr>