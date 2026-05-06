@csrf
<input type="hidden" name="_method" x-bind:value="isEdit ? 'PUT' : 'POST'">

{{-- Cliente + Empleado --}}
<div class="grid grid-cols-2 gap-3">
    <div>
        <label class="text-sm text-pink-700">Cliente</label>
        <select name="client_id" x-model="form.client_id"
                class="w-full border border-pink-200 rounded-xl px-3 py-2 bg-pink-50/40 text-pink-700 focus:ring-2 focus:ring-pink-500">
            <option value="">-- Seleccionar cliente --</option>
            @foreach($clients as $client)
                <option value="{{ $client->id }}">{{ $client->first_name }} {{ $client->last_name }}</option>
            @endforeach
        </select>
    </div>
    <div>
        <label class="text-sm text-pink-700">Empleado</label>
        <select name="employee_id" x-model="form.employee_id"
                class="w-full border border-pink-200 rounded-xl px-3 py-2 bg-pink-50/40 text-pink-700 focus:ring-2 focus:ring-pink-500">
            <option value="">-- Seleccionar empleado --</option>
            @foreach($employees as $employee)
                <option value="{{ $employee->id }}">{{ $employee->first_name }} {{ $employee->last_name }}</option>
            @endforeach
        </select>
    </div>
</div>

{{-- Servicio --}}
<div>
    <label class="text-sm text-pink-700">Servicio</label>
    <select name="service_id" x-model="form.service_id" @change="setDuration($event)"
            class="w-full border border-pink-200 rounded-xl px-3 py-2 bg-pink-50/40 text-pink-700 focus:ring-2 focus:ring-pink-500">
        <option value="">-- Seleccionar servicio --</option>
        @foreach($services as $service)
            <option value="{{ $service->id }}" data-duration="{{ $service->duration }}">
                {{ $service->name }} — S/ {{ $service->price }} — {{ $service->duration }} min
            </option>
        @endforeach
    </select>
</div>

{{-- Fecha + Hora Inicio + Hora Fin + Estado --}}
<div class="grid grid-cols-4 gap-3">
    <div>
        <label class="text-sm text-pink-700">Fecha</label>
        <input type="date" name="date" x-model="form.date" :min="today"
               @change="onDateChange()"
               class="w-full border border-pink-200 rounded-xl px-3 py-2">
    </div>
    <div>
        <label class="text-sm text-pink-700">Hora Inicio</label>
        <input type="time" name="start_time" x-model="form.start_time"
               @input="validateStartTime(); calculateEndTime()"
               class="w-full border border-pink-200 rounded-xl px-3 py-2">
    </div>
    <div>
        <label class="text-sm text-pink-700">Hora Fin</label>
        <input type="time" name="end_time" x-model="form.end_time" readonly
               class="w-full border border-pink-200 rounded-xl px-3 py-2 bg-gray-100">
    </div>
    <div>
        <label class="text-sm text-pink-700">Estado</label>
        <select name="status" x-model="form.status"
                class="w-full border border-pink-200 rounded-xl px-3 py-2 bg-pink-50/40 text-pink-700 focus:ring-2 focus:ring-pink-500">
            <option value="pending">Pendiente</option>
            <option value="confirmed">Confirmada</option>
            <option value="completed">Completada</option>
            <option value="cancelled">Cancelada</option>
        </select>
    </div>
</div>