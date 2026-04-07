<tr class="hover:bg-pink-50 transition">

<td class="px-6 py-3 text-pink-700 font-semibold">
    {{ $user->id }}
</td>

<td class="px-6 py-3 font-medium text-pink-800">
    {{ $user->name }}
</td>

<td class="px-6 py-3 text-pink-600">
    {{ $user->email }}
</td>

<td class="px-6 py-3">
    <span class="bg-pink-100 text-pink-700 px-3 py-1 rounded-full text-xs">
        {{ $user->role->name ?? 'Sin rol' }}
    </span>
</td>

<td class="px-6 py-3">
    @if($user->status)
        <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs">
            Activo
        </span>
    @else
        <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-xs">
            Inactivo
        </span>
    @endif
</td>

<td class="px-6 py-3 text-right flex justify-end gap-2">

    <button 
        @click='openEdit(@json($user))'
       class="bg-pink-500 hover:bg-pink-600 text-white px-3 py-1 rounded-full text-xs">
        Editar
    </button>

    <form action="{{ route('users.destroy', $user->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded-full text-xs">
            Eliminar
        </button>
    </form>

</td>

</tr>