{{-- USUARIO --}}

            {{-- Usuario Asociado --}}
<select x-model="form.user_id"
        name="user_id"
        class="w-full border border-pink-200 rounded-2xl px-4 py-3 bg-pink-50/40 text-pink-700 focus:ring-2 focus:ring-pink-500">
    <option value="">-- Seleccionar usuario --</option>
    <template x-for="u in availableUsers" :key="u.id">
        <option :value="u.id" x-text="`${u.name} (${u.email})`" :selected="u.id == form.user_id"></option>
    </template>
</select>

{{-- NOMBRES --}}
<div class="grid grid-cols-2 gap-4">
    <div>
        <label class="text-sm text-pink-700">Nombres</label>
        <input type="text" name="first_name" x-model="form.first_name"
            class="w-full border border-pink-200 rounded-xl px-3 py-2">
    </div>

    <div>
        <label class="text-sm text-pink-700">Apellidos</label>
        <input type="text" name="last_name" x-model="form.last_name"
            class="w-full border border-pink-200 rounded-xl px-3 py-2">
    </div>
</div>

{{-- TELÉFONO / COMISIÓN --}}
<div class="grid grid-cols-2 gap-4">
    <div>
        <label class="text-sm text-pink-700">Teléfono</label>
        <input type="text" name="phone" x-model="form.phone"
            class="w-full border border-pink-200 rounded-xl px-3 py-2">
    </div>

    <div>
        <label class="text-sm text-pink-700">Comisión</label>
        <input type="number" name="commission" x-model="form.commission"
            class="w-full border border-pink-200 rounded-xl px-3 py-2">
    </div>
</div>

{{-- ESPECIALIDAD --}}
<div>
    <label class="block mb-2 font-semibold text-pink-700">Especialidad</label>

    @php
        $specialties = [
            "Manicurista","Pedicurista","Nail Artist","Acrílicas",
            "Gel","Gelish","Esculpidas","Decoración 3D"
        ];
    @endphp

    <select name="specialty"
            x-model="form.specialty"
            class="w-full border border-pink-200 rounded-2xl px-4 py-3 bg-pink-50/40 text-pink-700 focus:ring-2 focus:ring-pink-500">

        <option value="">Seleccione una especialidad</option>

        @foreach($specialties as $spec)
            <option value="{{ $spec }}">{{ $spec }}</option>
        @endforeach

    </select>
</div>

{{-- HORARIO --}}
<div class="grid grid-cols-2 gap-4">
    <div>
        <label class="text-sm text-pink-700">Hora Inicio</label>
        <input type="time" name="work_start" x-model="form.work_start"
            class="w-full border border-pink-200 rounded-xl px-3 py-2">
    </div>

    <div>
        <label class="text-sm text-pink-700">Hora Fin</label>
        <input type="time" name="work_end" x-model="form.work_end"
            class="w-full border border-pink-200 rounded-xl px-3 py-2">
    </div>
</div>

{{-- DÍAS LIBRES --}}
<div>
    <label class="block mb-2 font-semibold text-pink-700">Días Libres</label>

    @php
        $weekDays = [
            'monday'=>'Lunes','tuesday'=>'Martes','wednesday'=>'Miércoles',
            'thursday'=>'Jueves','friday'=>'Viernes','saturday'=>'Sábado','sunday'=>'Domingo'
        ];
    @endphp

    <div class="grid grid-cols-3 gap-3">
        @foreach($weekDays as $key => $label)
            <label class="flex items-center gap-2 text-pink-700">
                <input type="checkbox"
                       name="days_off[]"
                       value="{{ $key }}"
                       x-model="form.days_off"
                       class="w-5 h-5 text-pink-600 rounded border-pink-300 focus:ring-pink-500">
                {{ $label }}
            </label>
        @endforeach
    </div>
</div>

{{-- ESTADO --}}
<div>
    <label class="text-sm text-pink-700">Estado</label>
    <select name="status" x-model="form.status"
        class="w-full border border-pink-200 rounded-xl px-3 py-2">
        <option value="1">Activo</option>
        <option value="0">Inactivo</option>
    </select>
</div>