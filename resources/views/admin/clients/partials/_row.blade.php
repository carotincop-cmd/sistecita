<tr class="hover:bg-pink-50 transition">

<td class="px-6 py-3 text-pink-700 font-semibold">
    {{ $client->id }}
</td>

<td class="px-6 py-3 font-medium text-pink-800">
    {{ $client->full_name }}
</td>

<td class="px-6 py-3 text-pink-600">
    {{ $client->phone ?? '—' }}
</td>

<td class="px-6 py-3 text-pink-600">
    {{ $client->email ?? '—' }}
</td>

<td class="px-6 py-3 text-pink-600">
    {{ $client->notes ?? '—' }}
</td>

<td class="px-6 py-3 text-right flex justify-end gap-2">

    <button 
        @click='openEdit(@json($client))'
        class="bg-pink-500 hover:bg-pink-600 text-white px-3 py-1 rounded-full text-xs">
        Editar
    </button>

    <form action="{{ route('clients.destroy', $client->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded-full text-xs">
            Eliminar
        </button>
    </form>

</td>

</tr>