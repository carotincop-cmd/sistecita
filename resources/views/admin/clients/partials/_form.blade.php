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

{{-- TELÉFONO / EMAIL --}}
<div class="grid grid-cols-2 gap-4">
    <div>
        <label class="text-sm text-pink-700">Teléfono</label>
        <input type="text" name="phone" x-model="form.phone"
            class="w-full border border-pink-200 rounded-xl px-3 py-2">
    </div>

    <div>
        <label class="text-sm text-pink-700">Email</label>
        <input type="email" name="email" x-model="form.email"
            class="w-full border border-pink-200 rounded-xl px-3 py-2">
    </div>
</div>

{{-- NOTAS --}}
<div>
    <label class="text-sm text-pink-700">Notas</label>
    <textarea name="notes" x-model="form.notes"
        class="w-full border border-pink-200 rounded-xl px-3 py-2"></textarea>
</div>