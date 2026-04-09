<tr class="hover:bg-pink-50 transition">

<td class="px-6 py-3 text-pink-700 font-semibold">
    {{ $employee->id }}
</td>

<td class="px-6 py-3 font-medium text-pink-800">
    {{ $employee->first_name }} {{ $employee->last_name }}
</td>

<td class="px-6 py-3 text-pink-600">
    {{ $employee->phone ?? '—' }}
</td>

<td class="px-6 py-3 text-pink-600">
    {{ $employee->specialty ?? '—' }}
</td>

<td class="px-6 py-3">
    <span class="bg-pink-100 text-pink-700 px-3 py-1 rounded-full text-xs">
        {{ $employee->user->role->name ?? 'Sin Rol' }}
    </span>
</td>

<td class="px-6 py-3 text-pink-600">
    @if($employee->work_start && $employee->work_end)
        {{ $employee->work_start->format('H:i') }} - {{ $employee->work_end->format('H:i') }}
    @else
        —
    @endif
</td>

<td class="px-6 py-3">
    @if($employee->days_off)
        @php
            $daysTranslate = [
                'monday' => 'Lunes',
                'tuesday' => 'Martes',
                'wednesday' => 'Miércoles',
                'thursday' => 'Jueves',
                'friday' => 'Viernes',
                'saturday' => 'Sábado',
                'sunday' => 'Domingo',
            ];
        @endphp

        <div class="flex flex-wrap gap-2">
            @foreach($employee->days_off as $day)
                <span class="bg-pink-100 text-pink-700 px-2 py-1 rounded-full text-xs">
                    {{ $daysTranslate[$day] ?? $day }}
                </span>
            @endforeach
        </div>
    @else
        —
    @endif
</td>

<td class="px-6 py-3">
    @if($employee->status)
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
        @click='openEdit(@json($employee))'
       class="bg-pink-500 hover:bg-pink-600 text-white px-3 py-1 rounded-full text-xs">
        Editar
    </button>

    <form action="{{ route('employees.destroy', $employee->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded-full text-xs">
            Eliminar
        </button>
    </form>

</td>

</tr>