<div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6">

    <div>
        <h2 class="text-2xl font-bold text-pink-600">
            ✨ Lista de Slides
        </h2>

        <p class="text-sm text-slate-500 dark:text-pink-200 mt-1">
            Administra los slides principales de la página web
        </p>
    </div>

    <button
        @click="openCreate()"
        class="inline-flex items-center gap-2 bg-pink-600 hover:bg-pink-700 text-white px-5 py-2.5 rounded-2xl shadow transition">

        <span class="text-lg">＋</span>
        Nuevo Slide
    </button>

</div>