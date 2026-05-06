{{-- resources/views/admin/carousel/partials/_modal.blade.php --}}

<div x-show="open"
     x-transition
     class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 px-4">

    {{-- MODAL SIEMPRE BLANCO --}}
    <div @click.outside="closeModal()"
         class="w-full max-w-4xl bg-white rounded-3xl shadow-2xl overflow-hidden border border-pink-100">

        {{-- HEADER --}}
        <div class="flex items-center justify-between px-6 py-5 border-b border-pink-100">

            <h2 class="text-xl font-bold text-pink-600"
                x-text="editMode ? 'Editar Slide' : 'Nuevo Slide'"></h2>

            <button @click="closeModal()"
                    class="w-10 h-10 rounded-full bg-pink-50 hover:bg-pink-100 text-pink-600 text-xl transition">
                ✕
            </button>

        </div>

        {{-- FORM --}}
        <form :action="formAction"
              method="POST"
              enctype="multipart/form-data"
              class="p-6 space-y-5">

            @csrf

            <template x-if="editMode">
                <input type="hidden" name="_method" value="PUT">
            </template>

            {{-- TITULO / SUBTITULO --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                <div>
                    <label class="text-sm text-pink-700">Título</label>
                    <input type="text" name="title" x-model="form.title"
                        class="w-full border border-pink-200 rounded-2xl px-4 py-3 bg-pink-50/40 text-pink-700 focus:ring-2 focus:ring-pink-500">
                </div>

                <div>
                    <label class="text-sm text-pink-700">Subtítulo</label>
                    <input type="text" name="subtitle" x-model="form.subtitle"
                        class="w-full border border-pink-200 rounded-2xl px-4 py-3 bg-pink-50/40 text-pink-700 focus:ring-2 focus:ring-pink-500">
                </div>

            </div>

            {{-- DESCRIPCION --}}
            <div>
                <label class="text-sm text-pink-700">Descripción</label>
                <textarea name="description" rows="4" x-model="form.description"
                    class="w-full border border-pink-200 rounded-2xl px-4 py-3 bg-pink-50/40 text-pink-700 focus:ring-2 focus:ring-pink-500"></textarea>
            </div>

            {{-- BOTON / LINK --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                <div>
                    <label class="text-sm text-pink-700">Texto Botón</label>
                    <input type="text" name="button_text" x-model="form.button_text"
                        class="w-full border border-pink-200 rounded-2xl px-4 py-3 bg-pink-50/40 text-pink-700 focus:ring-2 focus:ring-pink-500">
                </div>

                <div>
                    <label class="text-sm text-pink-700">Link Botón</label>
                    <input type="text" name="button_link" x-model="form.button_link"
                        class="w-full border border-pink-200 rounded-2xl px-4 py-3 bg-pink-50/40 text-pink-700 focus:ring-2 focus:ring-pink-500">
                </div>

            </div>

            {{-- IMAGEN / POSICION --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                <div>
                    <label class="text-sm text-pink-700">Imagen</label>
                    <input type="file" name="image"
                        class="w-full border border-pink-200 rounded-2xl px-4 py-3 bg-pink-50/40 text-pink-700 file:bg-pink-500 file:text-white file:border-0 file:px-4 file:py-2 file:rounded-xl">
                </div>

                <div>
                    <label class="text-sm text-pink-700">Posición</label>
                    <input type="number" min="0" name="position" x-model="form.position"
                        class="w-full border border-pink-200 rounded-2xl px-4 py-3 bg-pink-50/40 text-pink-700 focus:ring-2 focus:ring-pink-500">
                </div>

            </div>

            {{-- ESTADO --}}
            <div>
                <label class="text-sm text-pink-700">Estado</label>
                <select name="status" x-model="form.status"
                    class="w-full border border-pink-200 rounded-2xl px-4 py-3 bg-pink-50/40 text-pink-700 focus:ring-2 focus:ring-pink-500">
                    <option value="1">Activo</option>
                    <option value="0">Inactivo</option>
                </select>
            </div>

            {{-- FOOTER --}}
            <div class="flex justify-end gap-3 pt-5 border-t border-pink-100">

                <button type="button"
                        @click="closeModal()"
                        class="px-5 py-3 rounded-2xl border border-gray-300 text-gray-700 hover:bg-gray-100 transition">
                    Cancelar
                </button>

                <button type="submit"
                        class="px-6 py-3 rounded-2xl bg-pink-600 hover:bg-pink-700 text-white font-semibold shadow-lg transition">
                    Guardar Slide
                </button>

            </div>

        </form>

    </div>

</div>