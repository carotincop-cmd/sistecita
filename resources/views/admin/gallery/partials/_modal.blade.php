<div x-cloak>

    {{-- MODAL --}}
    <div
        x-show="open"
        x-transition
        class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 p-4"
    >

        <div
            @click.away="close"
            class="relative w-full max-w-2xl rounded-3xl bg-white p-6 shadow-2xl"
        >

            {{-- HEADER --}}
            <div class="mb-6 flex items-center justify-between">

                <div>

                    <h2
                        class="text-2xl font-bold text-pink-600"
                        x-text="isEdit ? 'Editar Trabajo' : 'Nuevo Trabajo'"
                    ></h2>

                    <p class="mt-1 text-sm text-pink-400">
                        Administra los trabajos realizados de la galería.
                    </p>

                </div>

                <button
                    @click="close"
                    class="text-xl text-gray-400 transition hover:text-red-500"
                >
                    ✕
                </button>

            </div>

            {{-- FORM --}}
            <form
                :action="formAction"
                method="POST"
                enctype="multipart/form-data"
                class="space-y-6"
            >

                @csrf

                <template x-if="isEdit">
                    <input type="hidden" name="_method" value="PUT">
                </template>

                {{-- FORM INPUTS --}}
                @include('admin.gallery.partials._form')

                {{-- FOOTER --}}
                <div class="flex justify-end gap-3 border-t border-pink-100 pt-5">

                    <button
                        type="button"
                        @click="close()"
                        class="rounded-2xl border border-gray-300 px-5 py-2 text-gray-700 transition hover:bg-gray-100"
                    >
                        Cancelar
                    </button>

                    <button
                        type="submit"
                        class="rounded-2xl bg-pink-600 px-5 py-2 text-white transition hover:bg-pink-700"
                    >
                        Guardar
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>