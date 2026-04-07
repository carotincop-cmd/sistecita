<div x-cloak>

    {{-- MODAL --}}
    <div x-show="open"
         class="fixed inset-0 bg-black/50 flex items-center justify-center z-50">

        <div @click.away="close"
             class="bg-white dark:bg-slate-900 rounded-3xl w-full max-w-3xl p-8 shadow-xl">

            {{-- HEADER --}}
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold text-pink-600"
                    x-text="isEdit ? 'Editar Empleado' : 'Crear Empleado'"></h2>

                <button @click="close"
                    class="text-gray-500 hover:text-red-500 text-xl">✕</button>
            </div>

            {{-- FORM --}}
            <form :action="formAction" method="POST" class="space-y-6">

                @csrf

                <template x-if="isEdit">
                    <input type="hidden" name="_method" value="PUT">
                </template>

                {{-- SOLO INPUTS --}}
                @include('employees.partials._form')

                {{-- BOTONES (ÚNICOS) --}}
                <div class="flex justify-end gap-3 pt-4">
                    <button type="button" @click="close()"
                        class="bg-gray-300 hover:bg-gray-400 px-5 py-2 rounded-full">
                        Cancelar
                    </button>

                    <button type="submit"
                        class="bg-pink-600 hover:bg-pink-700 text-white px-5 py-2 rounded-2xl">
                        Guardar
                    </button>
                </div>

            </form>

        </div>
    </div>

</div>