<div x-cloak>

<div x-show="open" x-transition class="fixed inset-0 z-50 flex items-center justify-center bg-black/50" x-cloak>
    <div @click.away="close()" class="bg-white rounded-2xl w-full max-w-lg p-6 space-y-6 relative">
        <h2 class="text-xl font-bold text-pink-600" x-text="isEdit ? 'Editar Categoría' : 'Nueva Categoría'"></h2>
        <form :action="formAction" method="POST" enctype="multipart/form-data">
            @csrf
            <template x-if="isEdit">
                <input type="hidden" name="_method" value="PUT">
            </template>

            @include('admin.service-categories.partials._form')

            <div class="flex justify-end gap-3 mt-6">
                <button type="button" @click="close()"
                        class="px-4 py-2 rounded-2xl border border-gray-300 text-gray-700 hover:bg-gray-100">
                    Cancelar
                </button>
                <button type="submit"
                        class="px-4 py-2 rounded-2xl bg-pink-600 text-white hover:bg-pink-700">
                    Guardar
                </button>
            </div>
        </form>
    </div>
</div>