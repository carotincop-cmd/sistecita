<script setup>
import { ref } from 'vue'

const mobileMenu = ref(false)

const toggleMenu = () => {
  mobileMenu.value = !mobileMenu.value
}
</script>

<template>
  <header
    class="fixed inset-x-0 top-0 z-[100] border-b border-white/20 bg-white/70 backdrop-blur-2xl"
  >
    <!-- Glow Background -->
    <div
      class="absolute inset-0 bg-gradient-to-r from-pink-100/40 via-white to-rose-100/40"
    ></div>

    <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

      <div class="flex h-20 items-center justify-between">

        <!-- Logo -->
        <a href="#inicio" class="group flex items-center gap-3">

          <div
            class="relative flex h-12 w-12 items-center justify-center overflow-hidden rounded-2xl bg-gradient-to-br from-fuchsia-500 via-pink-500 to-rose-500 shadow-xl shadow-pink-300/40 transition duration-300 group-hover:scale-105"
          >

            <!-- Shine -->
            <div
              class="absolute inset-0 bg-gradient-to-tr from-white/10 to-white/40 opacity-40"
            ></div>

            <span class="relative text-xl text-white">
              💅
            </span>

          </div>

          <div>
            <h1
              class="bg-gradient-to-r from-fuchsia-600 via-pink-600 to-rose-500 bg-clip-text text-xl font-extrabold tracking-tight text-transparent"
            >
              Test Nails
            </h1>

            <p class="text-xs font-medium tracking-wide text-pink-400">
              Beauty Studio
            </p>
          </div>

        </a>

        <!-- Desktop Menu -->
        <nav class="hidden items-center gap-2 rounded-full border border-pink-100 bg-white/80 px-3 py-2 shadow-lg shadow-pink-100/40 backdrop-blur-xl md:flex">

          <a
            href="#inicio"
            class="rounded-full px-5 py-2 text-sm font-semibold text-gray-600 transition-all duration-300 hover:bg-pink-50 hover:text-pink-600"
          >
            Inicio
          </a>

          <a
            href="#como-reservar"
            class="rounded-full px-5 py-2 text-sm font-semibold text-gray-600 transition-all duration-300 hover:bg-pink-50 hover:text-pink-600"
          >
            Reservar
          </a>

          <a
            href="#Servicios"
            class="rounded-full px-5 py-2 text-sm font-semibold text-gray-600 transition-all duration-300 hover:bg-pink-50 hover:text-pink-600"
          >
            Servicios
          </a>

          <a
            href="#galeria"
            class="rounded-full px-5 py-2 text-sm font-semibold text-gray-600 transition-all duration-300 hover:bg-pink-50 hover:text-pink-600"
          >
            Galería
          </a>

          <a
            href="#contacto"
            class="rounded-full px-5 py-2 text-sm font-semibold text-gray-600 transition-all duration-300 hover:bg-pink-50 hover:text-pink-600"
          >
            Contacto
          </a>

        </nav>

        <!-- Right -->
        <div class="flex items-center gap-3">

          <!-- CTA -->
          <a
            href="#Servicios"
            class="hidden items-center rounded-full bg-gradient-to-r from-fuchsia-500 via-pink-500 to-rose-500 px-6 py-3 text-sm font-semibold text-white shadow-xl shadow-pink-300/40 transition-all duration-300 hover:scale-105 hover:shadow-pink-400/50 md:inline-flex"
          >
            Reservar cita
          </a>

          <!-- Mobile Button -->
          <button
            @click="toggleMenu"
            class="flex h-12 w-12 items-center justify-center rounded-2xl border border-pink-100 bg-white/80 text-pink-600 shadow-lg shadow-pink-100/40 backdrop-blur-xl transition hover:scale-105 hover:bg-pink-50 md:hidden"
          >

            <!-- Open -->
            <svg
              v-if="!mobileMenu"
              xmlns="http://www.w3.org/2000/svg"
              class="h-6 w-6"
              fill="none"
              viewBox="0 0 24 24"
              stroke="currentColor"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M4 6h16M4 12h16M4 18h16"
              />
            </svg>

            <!-- Close -->
            <svg
              v-else
              xmlns="http://www.w3.org/2000/svg"
              class="h-6 w-6"
              fill="none"
              viewBox="0 0 24 24"
              stroke="currentColor"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M6 18L18 6M6 6l12 12"
              />
            </svg>

          </button>

        </div>

      </div>

      <!-- Mobile Menu -->
      <transition
        enter-active-class="transition duration-300 ease-out"
        enter-from-class="opacity-0 -translate-y-4 scale-95"
        enter-to-class="opacity-100 translate-y-0 scale-100"
        leave-active-class="transition duration-200 ease-in"
        leave-from-class="opacity-100 translate-y-0 scale-100"
        leave-to-class="opacity-0 -translate-y-4 scale-95"
      >

        <div
          v-if="mobileMenu"
          class="mb-4 overflow-hidden rounded-3xl border border-pink-100 bg-white/90 p-4 shadow-2xl shadow-pink-100/50 backdrop-blur-2xl md:hidden"
        >

          <nav class="flex flex-col gap-2">

            <a
              href="#inicio"
              class="rounded-2xl px-4 py-3 text-sm font-semibold text-gray-700 transition hover:bg-pink-50 hover:text-pink-600"
              @click="mobileMenu = false"
            >
              Inicio
            </a>

            <a
              href="#como-reservar"
              class="rounded-2xl px-4 py-3 text-sm font-semibold text-gray-700 transition hover:bg-pink-50 hover:text-pink-600"
              @click="mobileMenu = false"
            >
              ¿Cómo reservar?
            </a>

            <a
              href="#Servicios"
              class="rounded-2xl px-4 py-3 text-sm font-semibold text-gray-700 transition hover:bg-pink-50 hover:text-pink-600"
              @click="mobileMenu = false"
            >
              Servicios
            </a>

            <a
              href="#galeria"
              class="rounded-2xl px-4 py-3 text-sm font-semibold text-gray-700 transition hover:bg-pink-50 hover:text-pink-600"
              @click="mobileMenu = false"
            >
              Galería
            </a>

            <a
              href="#contacto"
              class="rounded-2xl px-4 py-3 text-sm font-semibold text-gray-700 transition hover:bg-pink-50 hover:text-pink-600"
              @click="mobileMenu = false"
            >
              Contacto
            </a>

            <!-- Mobile CTA -->
            <a
              href="#Servicios"
              class="mt-3 inline-flex justify-center rounded-2xl bg-gradient-to-r from-fuchsia-500 via-pink-500 to-rose-500 px-5 py-3 text-sm font-semibold text-white shadow-lg shadow-pink-300/40 transition hover:scale-[1.02]"
              @click="mobileMenu = false"
            >
              Reservar cita
            </a>

          </nav>

        </div>

      </transition>

    </div>
  </header>
</template>