<template>
  <section id="Servicios" class="py-20 bg-white">

    <div class="mx-auto max-w-7xl px-6 lg:px-8">

      <!-- HEADER -->
      <div class="mx-auto max-w-2xl text-center">
        <span class="inline-block rounded-full bg-pink-100 px-4 py-2 text-sm font-semibold text-pink-600">
          ✨ Nuestros Servicios
        </span>

        <h2 class="mt-4 text-4xl font-bold text-gray-900">
          Elige tu servicio ideal
        </h2>

        <p class="mt-4 text-gray-600">
          Selecciona una categoría y reserva directamente por WhatsApp
        </p>
      </div>

<!-- CATEGORÍAS (GRID 2 FILAS) -->
<div v-if="!loadingCategories"
     class="mt-10 grid grid-cols-2 sm:grid-cols-4 gap-4">

  <button
    v-for="cat in categories"
    :key="cat.id"
    @click="selectCategory(cat)"
    class="relative w-full rounded-2xl px-5 py-5 text-sm font-semibold transition-all duration-300 border overflow-hidden group"
    :class="selectedCategory?.id === cat.id
      ? 'bg-gradient-to-br from-pink-600 via-fuchsia-600 to-rose-500 text-white shadow-2xl scale-[1.03]'
      : 'bg-white text-gray-700 hover:bg-pink-50 border-pink-100 hover:scale-[1.03]'"
  >

    <!-- efecto 3D glow -->
    <span
      v-if="selectedCategory?.id === cat.id"
      class="absolute inset-0 bg-white/10 blur-2xl"
    ></span>

    <!-- brillo hover -->
    <span
      class="absolute inset-0 opacity-0 group-hover:opacity-100 transition bg-pink-200/20 blur-xl"
    ></span>

    <div class="relative z-10">
      {{ cat.name }}
    </div>

  </button>

</div>

      <!-- LOADING -->
      <div v-if="loadingCategories" class="mt-10 text-center text-pink-600">
        Cargando categorías...
      </div>

      <!-- SERVICIOS -->
      <div v-if="selectedCategory" class="mt-12">

        <div class="text-center mb-8">
          <h3 class="text-3xl font-bold text-gray-900">
            {{ selectedCategory.name }}
          </h3>
        </div>

        <div v-if="loadingServices" class="text-center text-pink-600">
          Cargando servicios...
        </div>

        <!-- WRAPPER -->
        <div v-else class="relative">

          <!-- BOTONES -->
          <button
            @click="scrollLeft"
            class="absolute left-0 top-1/2 z-10 -translate-y-1/2 rounded-full bg-white shadow-xl p-3 hidden lg:flex"
          >
            ‹
          </button>

          <button
            @click="scrollRight"
            class="absolute right-0 top-1/2 z-10 -translate-y-1/2 rounded-full bg-white shadow-xl p-3 hidden lg:flex"
          >
            ›
          </button>

          <!-- SCROLL AREA -->
          <div
            ref="slider"
            class="
              flex gap-6 overflow-x-auto scroll-smooth snap-x snap-mandatory pb-5 scrollbar-hide

              /* 🔥 MOBILE: 1 fila */
              lg:flex-wrap lg:overflow-visible lg:snap-none lg:justify-center
            "
          >

            <div
              v-for="service in services"
              :key="service.id"
              class="
                shrink-0 snap-center

                /* MOBILE */
                w-[85vw]

                /* TABLET */
                sm:w-[320px]

                /* DESKTOP → 2 filas ordenadas */
                lg:w-[300px]
              "
            >

              <!-- CARD -->
              <div class="h-full rounded-3xl bg-white shadow-xl border border-pink-100 overflow-hidden hover:shadow-2xl transition">

                <!-- IMAGE -->
                <div class="h-56 relative overflow-hidden">

                  <img
                    v-if="service.image"
                    :src="service.image"
                    class="h-full w-full object-cover hover:scale-105 transition duration-500"
                  />

                  <div v-else class="h-full flex items-center justify-center bg-pink-100 text-5xl">
                    💅
                  </div>

                  <div class="absolute top-3 left-3 bg-white/90 px-3 py-1 text-xs rounded-full text-pink-600">
                    {{ selectedCategory.name }}
                  </div>

                </div>

                <!-- CONTENT -->
                <div class="p-5">

                  <h3 class="text-lg font-bold text-gray-900">
                    {{ service.name }}
                  </h3>

                  <p class="text-sm text-gray-500 mt-2 line-clamp-2">
                    {{ service.description }}
                  </p>

                  <div class="flex justify-between mt-4">
                    <span class="text-sm text-gray-400">
                      {{ service.duration }} min
                    </span>

                    <span class="text-pink-600 font-bold">
                      S/ {{ service.price }}
                    </span>
                  </div>

                  <!-- WHATSAPP -->
                  <a
                    :href="getWhatsAppLink(service)"
                    target="_blank"
                    class="mt-5 block text-center bg-gradient-to-r from-green-500 to-emerald-500 text-white py-3 rounded-2xl font-semibold hover:scale-105 transition"
                  >
                    📲 Reservar por WhatsApp
                  </a>

                </div>

              </div>

            </div>

          </div>

        </div>

      </div>

    </div>
  </section>
</template>

<script setup>
import { ref, onMounted } from 'vue'
import axios from 'axios'

const categories = ref([])
const selectedCategory = ref(null)
const services = ref([])

const loadingCategories = ref(true)
const loadingServices = ref(false)

const slider = ref(null)

// 📲 WhatsApp (cámbialo)
const whatsappNumber = '51999999999'

// WhatsApp link
const getWhatsAppLink = (service) => {
  const msg = `Hola 👋 quiero reservar:
Servicio: ${service.name}
Precio: S/ ${service.price}`

  return `https://wa.me/${whatsappNumber}?text=${encodeURIComponent(msg)}`
}

// scroll
const scrollLeft = () => {
  slider.value.scrollBy({ left: -350, behavior: 'smooth' })
}

const scrollRight = () => {
  slider.value.scrollBy({ left: 350, behavior: 'smooth' })
}

// categorías
const fetchCategories = async () => {
  const res = await axios.get('/api/categories')
  categories.value = res.data

  if (categories.value.length) {
    selectCategory(categories.value[0])
  }

  loadingCategories.value = false
}

// servicios
const fetchServices = async (id) => {
  loadingServices.value = true
  const res = await axios.get('/api/services')

  services.value = res.data.filter(s => s.category_id === id)

  loadingServices.value = false
}

// select
const selectCategory = (cat) => {
  selectedCategory.value = cat
  fetchServices(cat.id)
}

onMounted(fetchCategories)
</script>