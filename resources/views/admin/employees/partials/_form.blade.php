@csrf
<input type="hidden" name="_method" x-bind:value="isEdit ? 'PUT' : 'POST'">

{{-- Usuario + Estado --}}
<div class="grid grid-cols-3 gap-3">
    <div class="col-span-2">
        <label class="text-sm text-pink-700">Usuario Asociado</label>
        <select x-model="form.user_id" name="user_id"
                class="w-full border border-pink-200 rounded-xl px-3 py-2 bg-pink-50/40 text-pink-700 focus:ring-2 focus:ring-pink-500">
            <option value="">-- Seleccionar usuario --</option>
            <template x-for="u in availableUsers" :key="u.id">
                <option :value="u.id" x-text="`${u.name} (${u.email})`" :selected="u.id == form.user_id"></option>
            </template>
        </select>
    </div>
    <div>
        <label class="text-sm text-pink-700">Estado</label>
        <select name="status" x-model="form.status"
                class="w-full border border-pink-200 rounded-xl px-3 py-2 bg-pink-50/40 text-pink-700 focus:ring-2 focus:ring-pink-500">
            <option value="1">Activo</option>
            <option value="0">Inactivo</option>
        </select>
    </div>
</div>

{{-- Nombres + Apellidos + Teléfono + Comisión --}}
<div class="grid grid-cols-4 gap-3">
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
    <div>
        <label class="text-sm text-pink-700">Teléfono</label>
        <input type="text" name="phone" x-model="form.phone"
               class="w-full border border-pink-200 rounded-xl px-3 py-2">
    </div>
    <div>
        <label class="text-sm text-pink-700">Comisión %</label>
        <input type="number" name="commission" x-model="form.commission"
               class="w-full border border-pink-200 rounded-xl px-3 py-2">
    </div>
</div>

{{-- Especialidad + Hora Inicio + Hora Fin --}}
<div class="grid grid-cols-3 gap-3">
    <div>
        <label class="text-sm text-pink-700">Especialidad</label>
        <select name="specialty" x-model="form.specialty"
                class="w-full border border-pink-200 rounded-xl px-3 py-2 bg-pink-50/40 text-pink-700 focus:ring-2 focus:ring-pink-500">
            <option value="">Seleccione</option>
            @foreach(["Manicurista","Pedicurista","Nail Artist","Acrílicas","Gel","Gelish","Esculpidas","Decoración 3D"] as $spec)
                <option value="{{ $spec }}">{{ $spec }}</option>
            @endforeach
        </select>
    </div>
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

{{-- Días Libres --}}
<div>
    <label class="text-sm font-medium text-pink-700 mb-1 block">Días Libres</label>
    <div class="grid grid-cols-7 gap-1">
        @foreach(['monday'=>'Lun','tuesday'=>'Mar','wednesday'=>'Mié','thursday'=>'Jue','friday'=>'Vie','saturday'=>'Sáb','sunday'=>'Dom'] as $key => $label)
            <label class="flex flex-col items-center gap-1 border border-pink-200 rounded-xl py-2 px-1 cursor-pointer hover:bg-pink-50 text-xs text-pink-700">
                <input type="checkbox" name="days_off[]" value="{{ $key }}"
                       x-model="form.days_off"
                       class="w-4 h-4 text-pink-600 rounded border-pink-300 focus:ring-pink-500">
                {{ $label }}
            </label>
        @endforeach
    </div>
</div>