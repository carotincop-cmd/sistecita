<tr class="hover:bg-pink-50 transition">

<td class="px-6 py-3 text-pink-700 font-semibold">{{ $role->id }}</td>

<td class="px-6 py-3 font-medium text-pink-800">{{ $role->name }}</td>

<td class="px-6 py-3 text-pink-600">{{ $role->description }}</td>

<td class="px-6 py-3">
    <div class="flex flex-wrap gap-2">
        @foreach($role->modules as $module)
            <span class="bg-pink-100 text-pink-700 px-2 py-1 rounded-full text-xs">
                {{ $module->name }}
            </span>
        @endforeach
    </div>
</td>

<td class="px-6 py-3">
    @if($role->status)
        <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs">Activo</span>
    @else
        <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-xs">Inactivo</span>
    @endif
</td>

<td class="px-6 py-3 text-right flex gap-2 justify-end">

    <button 
        @click='openEdit(@json($role))'
       class="bg-pink-500 hover:bg-pink-600 text-white px-3 py-1 rounded-full text-xs">
        Editar
    </button>

    <form action="{{ route('roles.destroy', $role->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button class="bg-red-500 text-white px-3 py-1 rounded-full text-xs">
            Eliminar
        </button>
    </form>

</td>

</tr>