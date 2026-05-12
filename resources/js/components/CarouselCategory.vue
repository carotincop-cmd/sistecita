<template>
  <section class="relative overflow-hidden py-24 bg-white">

    <!-- Blur decorativos -->
    <div class="absolute top-0 left-0 w-72 h-72 bg-pink-100 rounded-full blur-3xl opacity-40"></div>
    <div class="absolute bottom-0 right-0 w-96 h-96 bg-rose-100 rounded-full blur-3xl opacity-40"></div>

    <div class="relative mx-auto max-w-7xl px-6 lg:px-8 grid lg:grid-cols-2 gap-16 items-center">

      <!-- IZQUIERDA -->
      <div
        class="relative group [perspective:1400px]"
        @mousemove="handleMouseMove"
        @mouseleave="resetTilt"
      >

        <!-- Glow -->
        <div class="absolute -inset-4 rounded-[40px] bg-gradient-to-r from-pink-500/10 to-rose-500/10 blur-3xl opacity-70 group-hover:opacity-100 transition duration-500"></div>

        <!-- Card principal -->
        <div
          class="relative overflow-hidden rounded-[36px] border border-pink-100 bg-white shadow-[0_30px_80px_rgba(236,72,153,0.15)] transition-all duration-300"
          :style="cardStyle"
        >

          <div class="relative h-[520px]">

            <!-- Slides -->
            <transition-group name="fade" tag="div">

              <div
                v-for="(cat, index) in categories"
                v-show="index === currentIndex"
                :key="cat.id"
                class="absolute inset-0"
              >

                <img
                  :src="cat.image || 'https://via.placeholder.com/600x400'"
                  class="w-full h-full object-cover scale-105 group-hover:scale-110 transition duration-[2500ms]"
                />

                <!-- Overlay -->
                <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>

                <!-- Contenido -->
                <div class="absolute bottom-0 left-0 w-full p-8 z-10">

                  <span class="inline-flex items-center gap-2 rounded-full border border-white/20 bg-white/20 backdrop-blur-xl px-4 py-2 text-xs text-white mb-4">
                    ✨ Belleza Profesional
                  </span>

                  <h3 class="text-4xl font-black text-white drop-shadow-xl">
                    {{ cat.name }}
                  </h3>

                  <p class="mt-3 max-w-md text-sm leading-relaxed text-white/80">
                    Diseños modernos, acabados elegantes <br> y una experiencia premium pensada  <br> para resaltar tu estilo.
                  </p>

                </div>
              </div>

            </transition-group>

            <!-- Badge -->
            <div class="absolute top-6 right-6 rounded-2xl border border-white/40 bg-white/90 backdrop-blur-xl px-5 py-4 shadow-2xl">
              <p class="text-2xl font-black text-pink-600">5+</p>
              <p class="mt-1 text-xs text-gray-500">
                Años de experiencia
              </p>
            </div>

            <!-- Stats -->
            <div class="absolute bottom-6 right-6 z-20 flex gap-3">

              <div class="rounded-2xl border border-white/40 bg-white/90 backdrop-blur-xl px-4 py-3 shadow-xl">
                <p class="text-xs text-gray-500">
                  Clientes felices
                </p>
                <p class="font-bold text-gray-900">
                  +500
                </p>
              </div>

              <div class="rounded-2xl border border-white/40 bg-white/90 backdrop-blur-xl px-4 py-3 shadow-xl">
                <p class="text-xs text-gray-500">
                  Calidad
                </p>
                <p class="font-bold text-pink-600">
                  Premium
                </p>
              </div>

            </div>

          </div>

        </div>

      </div>

      <!-- DERECHA -->
      <div>

        <!-- Badge -->
        <span class="inline-flex items-center gap-2 rounded-full bg-pink-50 border border-pink-100 px-5 py-2 text-sm font-semibold text-pink-600 shadow-sm">
          ✨ ¿Por qué elegirnos?
        </span>

        <!-- Título -->
        <h2 class="mt-6 text-5xl font-black leading-tight text-gray-900">

          Experiencia, estilo y

          <span class="bg-gradient-to-r from-pink-500 to-rose-500 bg-clip-text text-transparent">
            resultados impecables
          </span>

        </h2>

        <!-- Texto -->
        <p class="mt-6 max-w-xl text-lg leading-relaxed text-gray-600">
          Realzamos la belleza de tus manos y pies con técnicas modernas,
          productos premium y atención personalizada para brindarte una
          experiencia elegante y duradera.
        </p>

        <!-- Features -->
        <div class="mt-10 space-y-5">

          <!-- Item -->
          <div class="group relative overflow-hidden rounded-3xl border border-pink-100 bg-white p-6 shadow-lg transition-all duration-500 hover:-translate-y-1 hover:shadow-2xl">

            <div class="absolute inset-0 bg-gradient-to-r from-pink-500/0 via-pink-500/5 to-rose-500/0 opacity-0 group-hover:opacity-100 transition"></div>

            <div class="relative flex items-start gap-5">

              <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-gradient-to-br from-pink-500 to-rose-500 text-2xl text-white shadow-lg">
                ✨
              </div>

              <div>
                <h4 class="text-lg font-bold text-gray-900">
                  Productos Premium
                </h4>

                <p class="mt-1 leading-relaxed text-gray-500">
                  Utilizamos productos profesionales de alta calidad para lograr acabados elegantes y duraderos.
                </p>
              </div>

            </div>

          </div>

          <!-- Item -->
          <div class="group relative overflow-hidden rounded-3xl border border-pink-100 bg-white p-6 shadow-lg transition-all duration-500 hover:-translate-y-1 hover:shadow-2xl">

            <div class="absolute inset-0 bg-gradient-to-r from-pink-500/0 via-pink-500/5 to-rose-500/0 opacity-0 group-hover:opacity-100 transition"></div>

            <div class="relative flex items-start gap-5">

              <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-gradient-to-br from-amber-400 to-orange-400 text-2xl text-white shadow-lg">
                👩‍🔬
              </div>

              <div>
                <h4 class="text-lg font-bold text-gray-900">
                  Técnicas Profesionales
                </h4>

                <p class="mt-1 leading-relaxed text-gray-500">
                  Contamos con experiencia y capacitación constante en tendencias modernas y cuidado estético.
                </p>
              </div>

            </div>

          </div>

          <!-- Item -->
          <div class="group relative overflow-hidden rounded-3xl border border-pink-100 bg-white p-6 shadow-lg transition-all duration-500 hover:-translate-y-1 hover:shadow-2xl">

            <div class="absolute inset-0 bg-gradient-to-r from-pink-500/0 via-pink-500/5 to-rose-500/0 opacity-0 group-hover:opacity-100 transition"></div>

            <div class="relative flex items-start gap-5">

              <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-gradient-to-br from-emerald-400 to-green-500 text-2xl text-white shadow-lg">
                🧼
              </div>

              <div>
                <h4 class="text-lg font-bold text-gray-900">
                  Higiene Garantizada
                </h4>

                <p class="mt-1 leading-relaxed text-gray-500">
                  Seguimos protocolos estrictos de limpieza y esterilización para tu seguridad y tranquilidad.
                </p>
              </div>

            </div>

          </div>

        </div>

        <!-- Footer -->
        <div class="mt-10 flex flex-wrap items-center gap-4">

          <a
            href="#Servicios"
            class="inline-flex items-center gap-2 rounded-2xl bg-gradient-to-r from-pink-500 to-rose-500 px-7 py-4 font-semibold text-white shadow-xl transition-all duration-300 hover:scale-105"
          >
            Ver servicios →
          </a>

          <div class="flex items-center gap-3 text-sm text-gray-500">

            <span>
              Más de <strong class="text-gray-900">500 clientas</strong> satisfechas
            </span>

          </div>

        </div>

      </div>

    </div>

  </section>
</template>

<script setup>
import { ref, computed, onMounted, onUnmounted } from 'vue'
import axios from 'axios'

const categories = ref([])
const currentIndex = ref(0)

const rotateX = ref(0)
const rotateY = ref(0)

let interval = null

const fetchCategories = async () => {
  try {
    const res = await axios.get('/api/categories')
    categories.value = res.data
  } catch (e) {
    console.error(e)
  }
}

const startCarousel = () => {
  interval = setInterval(() => {
    if (categories.value.length > 0) {
      currentIndex.value =
        (currentIndex.value + 1) % categories.value.length
    }
  }, 3500)
}

const handleMouseMove = (e) => {
  const card = e.currentTarget
  const rect = card.getBoundingClientRect()

  const x = e.clientX - rect.left
  const y = e.clientY - rect.top

  rotateY.value = ((x / rect.width) - 0.5) * 10
  rotateX.value = -((y / rect.height) - 0.5) * 10
}

const resetTilt = () => {
  rotateX.value = 0
  rotateY.value = 0
}

const cardStyle = computed(() => ({
  transform: `
    perspective(1400px)
    rotateX(${rotateX.value}deg)
    rotateY(${rotateY.value}deg)
    translateY(-4px)
  `
}))

onMounted(async () => {
  await fetchCategories()
  startCarousel()
})

onUnmounted(() => {
  clearInterval(interval)
})
</script>

<style scoped>
.fade-enter-active,
.fade-leave-active {
  transition: opacity .8s ease;
}

.fade-enter-from,
.fade-leave-to {
  opacity: 0;
}
</style>