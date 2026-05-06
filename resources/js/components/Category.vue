<template>
  <section class="py-20 bg-[#ffffff]">

    <div class="mx-auto max-w-7xl px-6 lg:px-8 grid lg:grid-cols-2 gap-12 items-center">

      <!-- IZQUIERDA: CARRUSEL -->
      <div class="relative rounded-3xl overflow-hidden shadow-xl h-[420px]">

        <transition-group name="fade" tag="div">
          <div
            v-for="(cat, index) in categories"
            v-show="index === currentIndex"
            :key="cat.id"
            class="absolute inset-0"
          >
            <img
              :src="cat.image || 'https://via.placeholder.com/600x400'"
              class="w-full h-full object-cover"
            />

            <!-- Overlay -->
            <div class="absolute inset-0 bg-black/40 flex items-end p-6">
              <h3 class="text-white text-2xl font-bold">
                {{ cat.name }}
              </h3>
            </div>
          </div>
        </transition-group>

        <!-- Badge -->
        <div class="absolute bottom-4 right-4 bg-white rounded-xl px-4 py-2 shadow">
          <p class="text-yellow-500 font-bold text-xl">5+</p>
          <p class="text-xs text-gray-600">Años de experiencia</p>
        </div>

      </div>

      <!-- DERECHA: CONTENIDO -->
      <div>

        <span class="inline-block bg-yellow-100 text-yellow-600 px-4 py-1 rounded-full text-sm font-semibold">
          ¿Por qué elegirnos?
        </span>

        <h2 class="mt-4 text-4xl font-bold text-gray-900 leading-tight">
          Experiencia y calidad en el corazón de San Viecente
        </h2>

        <p class="mt-4 text-gray-600">
Realzamos la belleza de tus manos y pies con técnicas profesionales y acabados impecables, cuidando cada detalle para un resultado duradero y sofisticado.        </p>

        <!-- ITEMS -->
        <div class="mt-8 space-y-4">

          <div class="bg-white rounded-xl p-4 shadow flex gap-4 items-start">
            <div class="bg-yellow-100 p-3 rounded-full">⭐</div>
            <div>
              <h4 class="font-semibold">Productos Premium</h4>
              <p class="text-sm text-gray-500">Usamos productos de alta calidad para resultados duraderos.</p>
            </div>
          </div>

          <div class="bg-white rounded-xl p-4 shadow flex gap-4 items-start">
            <div class="bg-yellow-100 p-3 rounded-full">👩‍🔧</div>
            <div>
              <h4 class="font-semibold">Equipo profesional</h4>
              <p class="text-sm text-gray-500">Técnicas certificadas con años de experiencia.</p>
            </div>
          </div>

          <div class="bg-white rounded-xl p-4 shadow flex gap-4 items-start">
            <div class="bg-yellow-100 p-3 rounded-full">🧼</div>
            <div>
              <h4 class="font-semibold">Higiene garantizada</h4>
              <p class="text-sm text-gray-500">Protocolos estrictos de limpieza y esterilización.</p>
            </div>
          </div>


        </div>

      </div>

    </div>

  </section>
</template>
<script setup>
import { ref, onMounted, onUnmounted } from 'vue'
import axios from 'axios'

const categories = ref([])
const currentIndex = ref(0)
let interval = null

const fetchCategories = async () => {
  try {
    const res = await axios.get('/api/categories')
    categories.value = res.data
  } catch (e) {
    console.error(e)
  }
}

// autoplay carrusel
const startCarousel = () => {
  interval = setInterval(() => {
    currentIndex.value =
      (currentIndex.value + 1) % categories.value.length
  }, 3000)
}

onMounted(async () => {
  await fetchCategories()
  startCarousel()
})

onUnmounted(() => {
  clearInterval(interval)
})
</script>
<style>
.fade-enter-active,
.fade-leave-active {
  transition: opacity 0.6s ease;
}
.fade-enter-from,
.fade-leave-to {
  opacity: 0;
}
</style>