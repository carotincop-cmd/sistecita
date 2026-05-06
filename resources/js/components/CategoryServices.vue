<template>
  <section id="Category" class="py-20 bg-white">

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
          Selecciona una categoría y descubre nuestros servicios disponibles.
        </p>
      </div>

      <!-- CATEGORÍAS GRANDES -->
      <div v-if="!loadingCategories" class="mt-10 grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4">

        <button
          v-for="cat in categories"
          :key="cat.id"
          @click="selectCategory(cat)"
          :class="[
            'rounded-2xl p-4 text-center font-semibold transition border',
            selectedCategory?.id === cat.id
              ? 'bg-pink-600 text-white shadow-lg scale-105'
              : 'bg-white text-gray-700 hover:bg-pink-50'
          ]"
        >
          {{ cat.name }}
        </button>

      </div>

      <!-- LOADING -->
      <div v-if="loadingCategories" class="mt-10 text-center text-pink-600">
        Cargando categorías...
      </div>

      <!-- CONTENIDO -->
      <div v-if="selectedCategory" class="mt-12">

        <!-- INFO CATEGORÍA -->
        <div class="text-center mb-10">
          <h3 class="text-3xl font-bold text-gray-900">
            {{ selectedCategory.name }}
          </h3>

          <p class="mt-3 text-gray-600">
            {{ selectedCategory.description || 'Servicios profesionales para realzar tu estilo.' }}
          </p>
        </div>

        <!-- LOADING SERVICIOS -->
        <div v-if="loadingServices" class="text-center text-pink-600">
          Cargando servicios...
        </div>

        <!-- SERVICIOS EN CARDS -->
        <div v-else class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">

          <div
            v-for="service in services"
            :key="service.id"
            class="rounded-3xl bg-white shadow-lg transition hover:shadow-2xl"
          >

            <!-- IMAGEN -->
            <div class="relative h-56 overflow-hidden rounded-t-3xl">
              <img
                v-if="service.image"
                :src="service.image"
                :alt="service.name"
                class="h-full w-full object-cover"
              >

              <div v-else class="w-full h-full flex items-center justify-center bg-pink-100 text-5xl">
                💅
              </div>

              <!-- BADGE -->
              <div class="absolute top-3 left-3 bg-white/90 text-pink-600 text-xs font-semibold px-3 py-1 rounded-full">
                {{ selectedCategory.name }}
              </div>
            </div>

            <!-- BODY -->
            <div class="p-5">

              <h3 class="text-xl font-bold text-gray-900">
                {{ service.name }}
              </h3>

              <p class="mt-2 text-sm text-gray-500 line-clamp-2">
                {{ service.description || 'Servicio profesional con acabados impecables.' }}
              </p>

              <!-- INFO -->
              <div class="mt-4 flex justify-between items-center">

                <div>
                  <p class="text-xs text-gray-400">Duración</p>
                  <p class="font-semibold text-gray-800">
                    {{ service.duration }} min
                  </p>
                </div>

                <div class="text-right">
                  <p class="text-xs text-gray-400">Precio</p>
                  <p class="text-xl font-bold text-pink-600">
                    S/ {{ service.price }}
                  </p>
                </div>

              </div>

              <!-- BOTÓN -->
              <a
                href="#reservar"
                class="mt-5 block text-center rounded-2xl bg-pink-600 px-4 py-3 text-sm font-semibold text-white hover:bg-pink-700 transition"
              >
                Reservar cita
              </a>

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

// FETCH CATEGORÍAS
const fetchCategories = async () => {
  try {
    const res = await axios.get('/api/categories')
    categories.value = res.data

    if (categories.value.length) {
      selectCategory(categories.value[0])
    }

  } catch (e) {
    console.error(e)
  } finally {
    loadingCategories.value = false
  }
}

// FETCH SERVICIOS
const fetchServices = async (categoryId) => {
  try {
    loadingServices.value = true

    const res = await axios.get('/api/services')
    services.value = res.data.filter(s => s.category_id === categoryId)

  } catch (e) {
    console.error(e)
  } finally {
    loadingServices.value = false
  }
}

// SELECT CATEGORY
const selectCategory = (cat) => {
  selectedCategory.value = cat
  fetchServices(cat.id)
}

onMounted(() => {
  fetchCategories()
})
</script>