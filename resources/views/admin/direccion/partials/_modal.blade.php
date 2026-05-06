<div x-show="$store.bsModal.open"
     x-cloak
     x-transition
     class="fixed inset-0 z-[100] bg-black/60 overflow-y-auto p-4 sm:p-6">

    <div @click.outside="$store.bsModal.closeModal()"
         class="w-full max-w-5xl bg-white rounded-3xl shadow-2xl flex flex-col mx-auto my-4">

        {{-- HEADER --}}
        <div class="flex-shrink-0 flex items-center justify-between px-6 py-3 border-b border-pink-100 bg-white rounded-t-3xl sticky top-0 z-10">
            <h2 class="text-xl font-bold text-pink-600"
                x-text="$store.bsModal.editMode ? 'Editar Dirección' : 'Nueva Dirección'"></h2>

            <button @click="$store.bsModal.closeModal()"
                    class="w-9 h-9 rounded-full bg-pink-50 hover:bg-pink-100 text-pink-600 flex items-center justify-center transition">
                ✕
            </button>
        </div>

        {{-- CUERPO --}}
        <div class="p-6 bg-white flex-1 rounded-b-3xl">
            <form :action="$store.bsModal.formAction" method="POST" class="space-y-3">
                @csrf
                <template x-if="$store.bsModal.editMode">
                    <input type="hidden" name="_method" value="PUT">
                </template>

                @include('admin.direccion.partials._form')

                {{-- FOOTER --}}
                <div class="flex justify-end gap-3 pt-4">
                    <button type="button"
                            @click="$store.bsModal.closeModal()"
                            class="px-5 py-2 rounded-2xl border border-gray-300 text-gray-700 hover:bg-gray-100 transition">
                        Cancelar
                    </button>

                    <button type="submit"
                            class="px-6 py-2 rounded-2xl bg-pink-600 hover:bg-pink-700 text-white font-semibold shadow-lg transition">
                        Guardar Dirección
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>