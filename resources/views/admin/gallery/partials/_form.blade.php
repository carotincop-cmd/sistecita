@csrf

<input
    type="hidden"
    name="_method"
    x-bind:value="isEdit ? 'PUT' : 'POST'"
>

{{-- Servicio + Estado --}}
<div class="grid grid-cols-1 gap-3 md:grid-cols-3">

    <!-- Servicio -->
    <div class="md:col-span-2">

        <label class="text-sm font-medium text-pink-700">
            Servicio
        </label>

        <select
            name="service_id"
            x-model="form.service_id"
            class="mt-1 w-full rounded-xl border border-pink-200 bg-pink-50/40 px-3 py-2 text-pink-700 focus:ring-2 focus:ring-pink-500"
            required
        >

            <option value="">
                -- Seleccionar servicio --
            </option>

            @foreach($services as $service)

                <option value="{{ $service->id }}">
                    {{ $service->name }}
                </option>

            @endforeach

        </select>

    </div>

    <!-- Estado -->
    <div>

        <label class="text-sm font-medium text-pink-700">
            Estado
        </label>

        <select
            name="status"
            x-model="form.status"
            class="mt-1 w-full rounded-xl border border-pink-200 bg-pink-50/40 px-3 py-2 text-pink-700 focus:ring-2 focus:ring-pink-500"
        >

            <option value="1">
                Activo
            </option>

            <option value="0">
                Inactivo
            </option>

        </select>

    </div>

</div>

{{-- Título --}}
<div>

    <label class="text-sm font-medium text-pink-700">
        Título del trabajo
    </label>

    <input
        type="text"
        name="title"
        x-model="form.title"
        placeholder="Ej: Uñas acrílicas rosadas"
        class="mt-1 w-full rounded-xl border border-pink-200 px-3 py-2 text-pink-700 placeholder-pink-300 focus:ring-2 focus:ring-pink-500"
        required
    >

</div>

{{-- Imagen --}}
<div>

    <label class="text-sm font-medium text-pink-700">
        Imagen del trabajo
    </label>

    <input
        type="file"
        name="image"
        class="mt-1 w-full rounded-xl border border-pink-200 bg-pink-50/40 px-3 py-2 text-sm text-pink-700 focus:ring-2 focus:ring-pink-500"
    >

    <p class="mt-1 text-xs text-pink-400">
        JPG, PNG o WEBP — Máx. 2MB
    </p>

</div>

{{-- Descripción --}}
<div>

    <label class="text-sm font-medium text-pink-700">
        Descripción
    </label>

    <textarea
        name="description"
        x-model="form.description"
        rows="4"
        placeholder="Describe el diseño realizado..."
        class="mt-1 w-full rounded-xl border border-pink-200 px-3 py-2 text-pink-700 placeholder-pink-300 focus:ring-2 focus:ring-pink-500"
    ></textarea>

</div>

{{-- Vista previa --}}
<div
    class="rounded-2xl border border-dashed border-pink-200 bg-pink-50/30 p-5"
>

    <h3 class="mb-3 text-sm font-semibold text-pink-700">
        Vista previa
    </h3>

    <div
        class="flex items-center gap-4 rounded-2xl bg-white p-4 shadow-sm"
    >

        <div
            class="flex h-20 w-20 items-center justify-center rounded-2xl bg-gradient-to-br from-pink-100 to-rose-100 text-3xl"
        >
            💅
        </div>

        <div>

            <h4
                class="font-bold text-gray-800"
                x-text="form.title || 'Título del trabajo'"
            ></h4>

            <p
                class="mt-1 text-sm text-pink-600"
                x-text="selectedServiceName"
            ></p>

            <p
                class="mt-2 text-xs text-gray-500 line-clamp-2"
                x-text="form.description || 'Descripción del trabajo realizado.'"
            ></p>

        </div>

    </div>

</div>