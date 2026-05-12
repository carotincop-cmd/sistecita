<script setup>
import { ref, computed, onMounted } from 'vue'
import axios from 'axios'

const slider = ref(null)
const activeFilter = ref('Todas')
const gallery = ref([])
const loading = ref(true)

// 🔥 FILTROS DINÁMICOS
const filters = computed(() => {
  const categories = gallery.value.map(item => item.category)
  return ['Todas', ...new Set(categories)]
})

// 🔥 FILTRAR
const filteredGallery = computed(() => {
  if (activeFilter.value === 'Todas') {
    return gallery.value
  }

  return gallery.value.filter(
    item => item.category === activeFilter.value
  )
})

// 🔥 SCROLL
const scrollLeft = () => {
  slider.value.scrollBy({
    left: -400,
    behavior: 'smooth',
  })
}

const scrollRight = () => {
  slider.value.scrollBy({
    left: 400,
    behavior: 'smooth',
  })
}

// 🔥 API
const fetchGallery = async () => {
  try {
    const response = await axios.get('/api/gallery')

    gallery.value = response.data.map(item => ({
      id: item.id,
      title: item.title,
      description: item.description,
      category: item.service?.name || 'Sin categoría',
      image: item.image
    }))

  } catch (error) {
    console.error(error)
  } finally {
    loading.value = false
  }
}

onMounted(() => {
  fetchGallery()
})
</script>

<template>
  <section
    id="galeria"
    class="relative overflow-hidden py-24 text-white"
  >

    <!-- 🌑 BACKGROUND PREMIUM -->
    <div class="absolute inset-0 bg-gradient-to-b from-[#0f0a12] via-[#1a0f1a] to-[#0b0b10]"></div>

    <!-- 💖 GLOW PRINCIPAL -->
    <div class="absolute top-[-120px] left-1/2 h-[600px] w-[600px] -translate-x-1/2 rounded-full bg-pink-500/20 blur-[120px]"></div>

    <!-- 🌫️ GLOW SECUNDARIO -->
    <div class="absolute bottom-[-120px] right-[-120px] h-[500px] w-[500px] rounded-full bg-fuchsia-500/10 blur-[120px]"></div>

    <!-- ✨ TEXTURA SUAVE -->
    <div class="absolute inset-0 opacity-[0.08] bg-[radial-gradient(#ffffff33_1px,transparent_1px)] [background-size:20px_20px]"></div>

    <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

      <!-- HEADER -->
      <div class="mx-auto mb-14 max-w-3xl text-center">

        <span
          class="inline-flex rounded-full border border-pink-400/30 bg-pink-500/10 px-5 py-2 text-sm font-semibold text-pink-200"
        >
          Trabajos realizados
        </span>

        <h2 class="mt-6 text-4xl font-black tracking-tight text-white md:text-5xl">
          Diseños que enamoran 💅
        </h2>

        <p class="mt-5 text-lg leading-relaxed text-white/70">
          Explora algunos de nuestros trabajos realizados con acabados modernos, elegantes y profesionales.
        </p>

      </div>

      <!-- FILTERS -->
      <div class="mb-10 flex gap-3 overflow-x-auto pb-2 scrollbar-hide">

        <button
          v-for="filter in filters"
          :key="filter"
          @click="activeFilter = filter"
          class="whitespace-nowrap rounded-full px-6 py-3 text-sm font-semibold transition-all duration-300"
          :class="
            activeFilter === filter
              ? 'bg-gradient-to-r from-fuchsia-500 via-pink-500 to-rose-500 text-white shadow-lg shadow-pink-500/30'
              : 'border border-white/10 bg-white/5 text-white/70 hover:bg-white/10 hover:text-white'
          "
        >
          {{ filter }}
        </button>

      </div>

      <!-- LOADING -->
      <div
        v-if="loading"
        class="py-20 text-center text-pink-300 font-semibold"
      >
        Cargando galería...
      </div>

      <!-- SLIDER -->
      <div v-else class="relative">

        <!-- LEFT -->
        <button
          @click="scrollLeft"
          class="absolute left-0 top-1/2 z-20 hidden -translate-y-1/2 rounded-full bg-white/10 p-4 backdrop-blur-xl transition hover:scale-110 lg:flex"
        >
          <svg class="h-5 w-5 text-pink-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
          </svg>
        </button>

        <!-- RIGHT -->
        <button
          @click="scrollRight"
          class="absolute right-0 top-1/2 z-20 hidden -translate-y-1/2 rounded-full bg-white/10 p-4 backdrop-blur-xl transition hover:scale-110 lg:flex"
        >
          <svg class="h-5 w-5 text-pink-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
          </svg>
        </button>

        <!-- CARDS -->
        <div
          ref="slider"
          class="flex snap-x snap-mandatory gap-6 overflow-x-auto pb-5 scrollbar-hide scroll-smooth"
        >

          <div
            v-for="item in filteredGallery"
            :key="item.id"
            class="group relative min-w-[280px] snap-start overflow-hidden rounded-[32px] border border-white/10 bg-white/95 shadow-2xl shadow-pink-500/10 backdrop-blur-xl transition duration-300 hover:-translate-y-2 hover:shadow-pink-500/30 sm:min-w-[340px]"
          >

            <!-- IMAGE -->
            <div class="h-[420px] overflow-hidden">

              <img
                v-if="item.image"
                :src="item.image"
                :alt="item.title"
                class="h-full w-full object-cover transition duration-500 group-hover:scale-105"
              />

              <div
                v-else
                class="flex h-full items-center justify-center bg-gradient-to-br from-pink-100 via-rose-50 to-pink-200"
              >
                <div class="text-center">
                  <div class="mx-auto flex h-20 w-20 items-center justify-center rounded-full bg-white/70 text-4xl shadow-lg backdrop-blur">
                    💅
                  </div>
                  <p class="mt-5 text-sm font-semibold tracking-wide text-pink-500">
                    Imagen no disponible
                  </p>
                </div>
              </div>

            </div>

            <!-- OVERLAY -->
            <div class="absolute inset-x-0 bottom-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent p-6">

              <div class="inline-flex rounded-full bg-white/20 px-3 py-1 text-xs font-semibold text-white backdrop-blur">
                {{ item.category }}
              </div>

              <h3 class="mt-3 text-xl font-bold text-white">
                {{ item.title || 'Diseño Premium' }}
              </h3>

              <p class="mt-2 text-sm text-white/80">
                {{ item.description || 'Acabado elegante y moderno para resaltar tu estilo.' }}
              </p>

            </div>

          </div>

        </div>

      </div>

      <!-- CTA -->
      <div class="mt-14 text-center">

        <a
          href="#Servicios"
          class="inline-flex items-center rounded-full bg-gradient-to-r from-fuchsia-500 via-pink-500 to-rose-500 px-8 py-4 text-sm font-semibold text-white shadow-xl shadow-pink-500/30 transition hover:scale-105"
        >
          Reservar mi cita
        </a>

      </div>

    </div>

  </section>
</template>

<style scoped>
.scrollbar-hide::-webkit-scrollbar {
  display: none;
}
.scrollbar-hide {
  -ms-overflow-style: none;
  scrollbar-width: none;
}
</style>