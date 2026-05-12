<template>
  <div class="relative min-h-screen overflow-x-hidden bg-pink-50 text-slate-900">

    <!-- Fondo decorativo -->
    <div class="pointer-events-none absolute inset-0">

      <div
        class="absolute inset-0 bg-[radial-gradient(circle_at_top_left,_rgba(236,72,153,0.12),_transparent_35%),radial-gradient(circle_at_top_right,_rgba(244,114,182,0.12),_transparent_30%),linear-gradient(to_bottom,_#fff1f2,_#ffe4e6)]">
      </div>

      <div
        class="absolute left-1/2 top-20 h-72 w-72 -translate-x-1/2 rounded-full bg-pink-400/10 blur-3xl">
      </div>

      <div
        class="absolute bottom-0 right-0 h-80 w-80 rounded-full bg-rose-400/10 blur-3xl">
      </div>

    </div>

    <!-- Navbar -->
    <Navbar />

    <!-- Espacio navbar fijo -->
    <div class="h-[88px]"></div>

    <!-- Contenido -->
    <main class="relative z-10">

      <!-- Hero -->
      <Carousel />

      <!-- Categorías -->
      <Category />

      <!-- Sección Manual -->
      <SeccionManual />

      <!-- Servicios -->
      <CategoryServices />

      <!-- Galería -->
      <Galeria />

    </main>

    <!-- Footer -->
    <Footer />

  </div>
</template>

<script setup>
import Navbar from './components/Navbar.vue'
import Carousel from './components/Carousel.vue'
import Category from './components/CarouselCategory.vue'
import SeccionManual from './components/SeccionManual.vue'
import CategoryServices from './components/CategoryServices.vue'
import Galeria from './components/Galeria.vue'
import Footer from './components/Footer.vue'
</script>