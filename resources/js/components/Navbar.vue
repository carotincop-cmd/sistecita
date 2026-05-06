<template>
  <header
    class="fixed inset-x-0 top-0 z-[100] border-b border-pink-100 bg-white/90 backdrop-blur-xl shadow-sm">

    <div class="mx-auto max-w-7xl px-6 lg:px-8">

      <div class="flex h-20 items-center justify-between">

        <!-- Logo -->
        <a href="#inicio" class="flex items-center gap-3">

          <div
            class="flex h-12 w-12 items-center justify-center rounded-2xl bg-gradient-to-br from-pink-500 to-rose-500 shadow-lg shadow-pink-300/30">

            <span class="text-xl">💅</span>

          </div>

          <div>
            <h1 class="text-xl font-bold leading-none text-pink-700">
              Test Nails
            </h1>

            <p class="text-xs text-pink-400">
              Belleza & Estilo
            </p>
          </div>

        </a>

        <!-- Menu Desktop -->
        <nav class="hidden items-center gap-8 md:flex">

          <a href="#inicio"
            class="text-sm font-medium text-gray-600 transition hover:text-pink-600">
            Inicio
          </a>

          <a href="#Category"
            class="text-sm font-medium text-gray-600 transition hover:text-pink-600">
            Category
          </a>

          <a href="#servicios"
            class="text-sm font-medium text-gray-600 transition hover:text-pink-600">
            Servicios
          </a>

          <a href="#galeria"
            class="text-sm font-medium text-gray-600 transition hover:text-pink-600">
            Galería
          </a>

          <a href="#contacto"
            class="text-sm font-medium text-gray-600 transition hover:text-pink-600">
            Contacto
          </a>

        </nav>

        <!-- CTA -->
        <div class="flex items-center gap-3">

          <a href="#reservar"
            class="inline-flex items-center rounded-xl bg-pink-600 px-5 py-3 text-sm font-semibold text-white shadow-lg shadow-pink-400/20 transition hover:bg-pink-700">
            Reservar cita
          </a>

        </div>

      </div>

    </div>
  </header>
</template>