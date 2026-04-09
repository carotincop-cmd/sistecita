@csrf

{{-- Para UPDATE --}}
<input type="hidden" name="_method" x-bind:value="isEdit ? 'PUT' : 'POST'">

{{-- Nombre --}}
<div>
    <label class="block mb-2 font-medium text-pink-600">Nombre *</label>
    <input type="text" name="name" x-model="form.name"
     class="w-full border border-pink-300 rounded-2xl px-4 py-3 text-pink-700 focus:outline-none focus:ring focus:ring-pink-300" required>
</div>

{{-- Email --}}
<div>
    <label class="block mb-2 font-medium text-pink-600">Correo</label>
    <input type="email" name="email" x-model="form.email"
        class="w-full border border-pink-300 rounded-2xl px-4 py-3 text-pink-700 focus:outline-none focus:ring focus:ring-pink-300" required>
</div>

{{-- Password --}}
<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    
    <div>
        <label class="block mb-2 font-medium text-pink-600">
            Contraseña
        </label>
        <input type="password" name="password"
            class="w-full border border-pink-300 rounded-2xl px-4 py-3 text-pink-700 focus:outline-none focus:ring focus:ring-pink-300"
            :required="!isEdit">
    </div>

    <div>
        <label class="block mb-2 font-medium text-pink-600">
            Confirmar contraseña
        </label>
        <input type="password" name="password_confirmation"
            class="w-full border border-pink-300 rounded-2xl px-4 py-3 text-pink-700 focus:outline-none focus:ring focus:ring-pink-300"
            :required="!isEdit">
    </div>

</div>

{{-- Rol + Estado --}}
<div class="grid grid-cols-1 md:grid-cols-2 gap-6">

    {{-- Rol --}}
    <div>
        <label class="block mb-2 font-medium text-pink-600">Rol</label>
        <select name="role_id" x-model="form.role_id"
            class="w-full border border-pink-300 rounded-2xl px-4 py-3 text-pink-700 focus:outline-none focus:ring focus:ring-pink-300"
            required>
            <option value="">Seleccione</option>

            @foreach ($roles as $role)
                <option value="{{ $role->id }}">{{ $role->name }}</option>
            @endforeach
        </select>
    </div>

    {{-- Estado --}}
    <div>
        <label class="block mb-2 font-medium text-pink-600">Estado</label>
        <select name="status" x-model="form.status"
            class="w-full border border-pink-300 rounded-2xl px-4 py-3 text-pink-700 focus:outline-none focus:ring focus:ring-pink-300"
            required>
            <option value="1">Activo</option>
            <option value="0">Inactivo</option>
        </select>
    </div>

</div>